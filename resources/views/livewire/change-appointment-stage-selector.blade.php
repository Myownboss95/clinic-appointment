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

    @if ($showPasswordField)
        <div class="mb-2">
            <input type="password" wire:model="password" placeholder="Enter password to confirm" class="form-control">
        </div>

        <div class="mb-4">
            <button wire:click="updateAppointmentStage" class="btn btn-primary btn-md">Update Status</button>
        </div>
    @endif
</div>