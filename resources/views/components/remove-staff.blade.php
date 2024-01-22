@props(['id'])
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Enter Password To Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.remove-admin', [$id]) }}" method="POST">
                    @csrf
                    <input type="password" name="password" placeholder="Enter password to confirm"
                        class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger waves-effect mt-2 waves-light">
                    <i class="bx bx-user"></i> Remove Admin
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


