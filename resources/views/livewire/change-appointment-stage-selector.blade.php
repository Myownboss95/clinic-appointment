@php
    use App\Models\Stage;
@endphp

<div>
    <label for="status" class="form-label">Select Stages</label>

    <div class=" mb-2">
        <select wire:model="selectedStage" class="form-select" id="status">
            @foreach (Stage::all() as $stage)
                <option value="{{ $stage->id }}">{{ $stage->name }}</option>
            @endforeach
        </select>
    </div>

    @if ($selectedStage)
        <div class="mb-2">
            <input type="password" wire:model="password" placeholder="Enter password to confirm" class="form-control">
        </div>

        <div class="mb-4">
            <button wire:click="updateAppointmentStage" class="btn btn-primary btn-md">Update Status</button>
        </div>
    @endif
</div>
