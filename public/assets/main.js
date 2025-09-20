// AOS Animation
AOS.init({
  duration: 1000,
  once: true
});


// Bootstrap Tooltips scrollSpy
if (document.body) {
  new bootstrap.ScrollSpy(document.body, {
    target: '#navbarNav',
    offset: 70
  });
}


// Preloader
window.addEventListener("load", function () {
  const preloader = document.getElementById("preloader");
  if (preloader) {
    setTimeout(() => {
      preloader.classList.add("hidden");
    }, 1500);
  }
});


// Back to Top Button
const backToTopBtn = document.getElementById('backToTop');
if (backToTopBtn) {
  window.addEventListener('scroll', () => {
    backToTopBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
  });

  backToTopBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}


// Smooth Scroll for Anchor Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});


// Dark Mode Toggle
const toggle = document.getElementById('themeToggle');
if (toggle) {
  toggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    toggle.textContent = document.body.classList.contains('dark-mode') ? '☀️' : '🌙';
  });
}


// Typed.js for Hero Text
if (document.querySelector(".lead")) {
  new Typed(".lead", {
    strings: ["Laravel Developer", "UI Designer", "Full Stack Developer"],
    typeSpeed: 60,
    backSpeed: 100,
    loop: true
  });
}

// Skills Progress Bar
document.addEventListener('DOMContentLoaded', function () {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const bars = entry.target.querySelectorAll('.progress-bar');
        bars.forEach(bar => {
          const percent = bar.getAttribute('aria-valuenow');
          bar.style.width = percent + '%';
        });
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('.skill-card').forEach(card => {
    observer.observe(card);
  });
});


// AJAX load contacts and auto refresh every 10 seconds
function loadContacts() {
  const wrapper = document.getElementById("contactsTableWrapper");
  if (!wrapper) return; // ✅ যদি না থাকে, কিছুই করবে না

  fetch("/admin/contacts/fetch")
    .then(res => res.json())
    .then(data => {
      let html = '';
      if (data.length > 0) {
        html += `
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover align-middle text-center">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Received At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>`;
        data.forEach((contact, index) => {
          html += `
            <tr>
              <td>${index + 1}</td>
              <td>${contact.name}</td>
              <td>${contact.email}</td>
              <td>${contact.message.length > 60 ? contact.message.substring(0, 60) + '...' : contact.message}</td>
              <td>${new Date(contact.created_at).toLocaleString()}</td>
              <td>
                <button class="btn btn-danger btn-sm delete-btn"
                  data-id="${contact.id}"
                  data-name="Contact Message"
                  data-url="/admin/contacts/${contact.id}">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </td>
            </tr>`;
        });
        html += `</tbody></table></div>`;
      } else {
        html = `<div class="alert alert-info text-center">No contact messages found.</div>`;
      }
      wrapper.innerHTML = html;
    })
    .catch(err => console.error("Error loading contacts:", err));
}


// Modal & Toast
document.addEventListener('DOMContentLoaded', function () {
  let selectedUrl = null;
  let selectedRow = null;

  const deleteModalEl = document.getElementById('deleteConfirmModal');
  const deleteToastEl = document.getElementById('deleteToast');
  const modalTitle = document.getElementById('modalTitle');
  const modalMessage = document.getElementById('modalMessage');
  const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

  const deleteModal = deleteModalEl ? new bootstrap.Modal(deleteModalEl) : null;
  const deleteToast = deleteToastEl ? new bootstrap.Toast(deleteToastEl) : null;

  document.addEventListener('click', function (e) {
    const button = e.target.closest('.delete-btn');
    if (button && deleteModal) {
      selectedUrl = button.getAttribute('data-url');
      selectedRow = button.closest('tr');
      const name = button.getAttribute('data-name');

      if (modalTitle) modalTitle.innerHTML = `<i class="bi bi-trash-fill"></i> Delete ${name}`;
      if (modalMessage) modalMessage.textContent = `Are you sure you want to delete this ${name}?`;

      deleteModal.show();
    }
  });

  if (confirmDeleteBtn) {
    confirmDeleteBtn.addEventListener('click', function () {
      if (selectedUrl && selectedRow) {
        fetch(selectedUrl, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            if (data.status === 'success') {
              selectedRow.style.transition = "opacity 0.5s ease";
              selectedRow.style.opacity = 0;
              setTimeout(() => selectedRow.remove(), 500);
              if (deleteToast) deleteToast.show();
            }
          })
          .catch(err => console.error('Delete error:', err))
          .finally(() => deleteModal && deleteModal.hide());
      }
    });
  }

  // Initial load & auto refresh
  loadContacts();
  setInterval(loadContacts, 10000);
});


// Contact Form Submission with Fetch API and SweetAlert2 Toasts
const contactForm = document.getElementById("contactForm");
if (contactForm) {
  contactForm.addEventListener("submit", function (e) {
    e.preventDefault();

    let form = e.target;
    let formData = new FormData(form);

    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'info',
      title: 'Sending message...',
      showConfirmButton: false,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading()
      }
    });

    fetch(form.action, {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
      },
      body: formData
    })
      .then(res => res.json())
      .then(data => {
        Swal.close();
        if (data.success) {
          Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: data.success,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          });
          form.reset();
        } else {
          Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: 'Something went wrong!',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          });
        }
      })
      .catch(err => {
        Swal.close();
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'error',
          title: 'Error: ' + err,
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true
        });
      });
  });
}


// skill form create & update
document.addEventListener("DOMContentLoaded", function () {
    handleSkillForm("skillForm", "saveBtn");   // create
    handleSkillForm("editSkillForm", "updateBtn"); // update

    function handleSkillForm(formId, btnId) {
        const formEl = document.getElementById(formId);
        if (!formEl) return;

        formEl.addEventListener("submit", function (e) {
            e.preventDefault();

            let form = e.target;
            let formData = new FormData(form);
            let btn = document.getElementById(btnId);
            let spinner = btn.querySelector(".spinner-border");

            btn.disabled = true;
            spinner.classList.remove("d-none");

            // info toast
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: 'Processing...',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });

            fetch(form.action, {
                method: form.method, // POST (create) বা PUT (update)
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    spinner.classList.add("d-none");

                    if (data.success) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        if (formId === "skillForm") {
                            form.reset();
                            addSkillRow(data.skill);
                        } else if (formId === "editSkillForm") {
                            // Redirect to index page বা চাইলে টেবিলে আপডেট
                            setTimeout(() => {
                                window.location.href = "/admin/skills";
                            }, 1500);
                        }
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Something went wrong!',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    spinner.classList.add("d-none");

                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'error',
                        title: 'Error: ' + err,
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                });
        });
    }

    // শুধু create এর জন্য row add
    function addSkillRow(skill) {
        let tbody = document.querySelector("table tbody");
        if (!tbody) return;

        let row = `
            <tr>
                <td>${skill.name}</td>
                <td><i class="fab ${skill.icon}"></i></td>
                <td><span class="badge bg-${skill.color}">${skill.color}</span></td>
                <td>${skill.percent}%</td>
                <td>
                    <a href="/admin/skills/${skill.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="${skill.id}" data-name="Skill" data-url="/admin/skills/${skill.id}">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </td>
            </tr>
        `;
        tbody.insertAdjacentHTML("afterbegin", row);
    }
});



document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[data-route]');
    const content = document.getElementById('content');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent full page reload
            const url = this.getAttribute('data-route');

            // Fetch content via AJAX
            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(response => response.text())
                .then(html => {
                    content.innerHTML = html;

                    // Optional: update URL in browser without reload
                    history.pushState(null, '', url);

                    // Optional: handle active class
                    links.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                })
                .catch(err => console.log(err));
        });
    });

    // Handle browser back/forward
    window.addEventListener('popstate', () => {
        location.reload();
    });
});
