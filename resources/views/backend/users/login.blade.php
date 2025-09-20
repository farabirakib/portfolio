<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | FarabiRakib</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/backend/login.css') }}">
</head>

<body>

    <div class="login-card">
        <h3 class="text-center mb-4">Login to Your Account</h3>

        <form id="loginForm" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}"
                    placeholder="Enter email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password-field"
                        placeholder="Password" minlength="4" maxlength="8" required>
                    <span class="input-group-text">
                        <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </form>

        <div id="loginMessage"></div>

    </div>

    <!-- Toast container (left-bottom) -->
    <div class="toast-container position-fixed bottom-0 start-0 p-3" style="z-index: 9999">
        <div id="loginToast" class="toast align-items-center text-bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="loginToastMessage">
                    <!-- message আসবে এখানে -->
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("loginForm");

        form.addEventListener("submit", function(e) {
            e.preventDefault();

            let formData = new FormData(form);

            fetch(form.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json",
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    const toastEl = document.getElementById("loginToast");
                    const toastMessage = document.getElementById("loginToastMessage");

                    // ✅ Message বসানো
                    toastMessage.textContent = data.message;

                    // ✅ Success হলে toast এর color green হবে, না হলে red
                    if (data.success) {
                        toastEl.classList.remove("text-bg-danger");
                        toastEl.classList.add("text-bg-success");
                    } else {
                        toastEl.classList.remove("text-bg-success");
                        toastEl.classList.add("text-bg-danger");
                    }

                    // ✅ Toast show করা
                    const toast = new bootstrap.Toast(toastEl);
                    toast.show();

                    // ✅ Success হলে redirect
                    if (data.success) {
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 1500); // 1.5s পরে redirect করবে
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    const toastEl = document.getElementById("loginToast");
                    const toastMessage = document.getElementById("loginToastMessage");

                    toastMessage.textContent = "Something went wrong!";
                    toastEl.classList.remove("text-bg-success");
                    toastEl.classList.add("text-bg-danger");

                    const toast = new bootstrap.Toast(toastEl);
                    toast.show();
                });
        });

        // Show/Hide password
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("password-field");
        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("bi-eye");
            this.classList.toggle("bi-eye-slash");
        });
    });
    </script>



</body>

</html>