@props(['url', 'id', 'user'])
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">View User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if ($user->bankDetail)
            <div class="modal-body">
                    <p class="text-muted">
                        Make Payment into the following bank details and confirm that you've made this transaction.
                    </p>
                    <p class="text-muted">
                        Bank : <strong>{{ $user->bankDetail->bank }}</strong>
                        Account Name : <strong>{{ $user->bankDetail->accountName }}</strong>
                        Account Number : <strong>{{ $user->bankDetail->accountNumber }}</strong>
                    </p>
                
                <form action="{{ roleBasedRoute('update.referral.status', [$id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb">

                        <label for="password">Enter Password</label>
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
            @else
            <div class="modal-body">
                <p class="text-muted">
                    User has not filled bank details
                </p>
            </div>
                @endif
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
