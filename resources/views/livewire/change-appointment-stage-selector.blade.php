@php
    use App\Models\Stage;
@endphp
<div class="my-5">
    <label for="status" class="form-label">Change Appointment Stage</label>

    <div class=" mb-2">
        <select wire:change="updateSelectedStage" class="form-select" id="stage" wire:model="selectedStage">
            @foreach (Stage::all() as $stage)
                <option value="{{ $stage->id }}">{{ $stage->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- @if ($showPasswordField)
        <div class="mb-2">
            <input type="password" wire:model="password" placeholder="Enter password to confirm" class="form-control">
        </div>

        <div class="mb-4">
            <button wire:click="updateAppointmentStage" class="btn btn-primary btn-md">Update Status</button>
        </div>
    @endif --}}
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Enter Password To Proceed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="password" wire:model="password" placeholder="Enter password to change the stage"
                        class="form-control" autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="updateAppointmentStage" class="btn btn-primary">Update Stage</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        // window.addEventListener('toggle-password-modal', event => {
        //     const modal = document.getElementById('passwordModal');
        //     if (event.detail.show) {
        //         $(modal).modal('show'); // Use jQuery or Bootstrap's JavaScript directly
        //     } else {
        //         $(modal).modal('hide');
        //     }
        // });
        window.addEventListener('toggle-password-modal', () => {
            const passwordModal = document.getElementById('passwordModal');
            const modal = bootstrap.Modal.getOrCreateInstance(passwordModal);
            modal.show();
        });
    </script>
@endpush
