    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Enter Password To Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ roleBasedRoute('appointments.destroy', [$appointment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="password" name="password" placeholder="Enter password to confirm"
                            class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect mt-2 waves-light">
                        <i class="bx bx-trash"></i> Delete
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('deleteButton').addEventListener('click', () => {
                const deleteModal = document.getElementById('deleteModal');
                const modal = new bootstrap.Modal(deleteModal);
                modal.show();
            });
        </script>
    @endpush
