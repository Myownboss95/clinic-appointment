@php
    use App\Constants\TransactionStatusTypes; 
@endphp
<div>
    <label for="status" class="form-label">Select Transaction Status</label>
    <div class=" mb-2">
        <select wire:model="selectedStatus" class="form-select" id="status">
            @foreach (TransactionStatusTypes::cases() as $status)
                <option value="{{ $status->value }}">{{ $status->name }}</option>
            @endforeach
        </select>
    </div>

    @if ($selectedStatus)
        <div class="mb-2">
            <input type="password" wire:model="password" placeholder="Enter password to confirm"
                class="form-control">
        </div>
        <div class="mb-4">
            <button wire:click="updateTransactionStatus" class="btn btn-primary btn-md">Update Status</button>
        </div>
    @endif
</div>
