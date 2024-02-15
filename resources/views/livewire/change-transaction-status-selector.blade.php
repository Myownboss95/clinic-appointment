@php
    use App\Constants\TransactionStatusTypes; 
@endphp
<div class="my-2">
    <label for="status" class="form-label">Change Transaction Status</label>
    <div class=" mb-2">
        <select wire:change="updateSelectedStatus" class="form-select" id="stage" wire:model="selectedStatus">
            @foreach (TransactionStatusTypes::cases() as $status)
                <option value="{{ $status->value }}">{{ $status->value }}</option>
            @endforeach
        </select>
    </div>

    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Enter Password To Proceed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="password" wire:model="password" placeholder="Enter password to change the status"
                        class="form-control" autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="updateTransactionStatus" class="btn btn-primary">Update Transaction Status</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('toggle-password-modal', () => {
            const passwordModal = document.getElementById('passwordModal');
            const modal = bootstrap.Modal.getOrCreateInstance(passwordModal);
            modal.show();
        });
    </script>
@endpush
