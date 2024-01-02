<div>
    <div class="mb-3">
        <label for="input-country" class="form-label">Country</label>
        <div class="mb-3">
            <select id="input-country" wire:model="selectedCountry" wire:change="getStates($event.target.value)" class="form-select" name="country">
                <option value="" disabled>Choose Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country }}">{{ $country }}</option>
                @endforeach
            </select>
        </div>

        @if (!is_null($selectedCountry))
            <label for="input-state" class="form-label">State</label>
            <div class="mb-3">
                <select id="input-state" wire:model="selectedState" class="form-select" name="state">
                    <option value="" disabled>Choose State</option>
                    @foreach ($states as $state)
                        <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
</div>
