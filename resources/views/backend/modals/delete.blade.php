<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg rounded-3">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalTitle">
          <i class="bi bi-trash-fill"></i> Delete
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <i class="bi bi-exclamation-triangle-fill text-danger fs-1 mb-3"></i>
        <p class="fs-5" id="modalMessage">Are you sure you want to delete this item?</p>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteBtn" class="btn btn-danger d-flex align-items-center gap-2">
          <i class="bi bi-trash"></i> Yes, Delete
        </button>
      </div>
    </div>
  </div>
</div>
