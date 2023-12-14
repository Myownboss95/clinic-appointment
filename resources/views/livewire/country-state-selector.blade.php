<div class="form-floating form-floating-custom mb-4">
    {{-- <label class="form-label">Country</label> --}}
    <select id="input-country" wire:model="selectedCountry" wire:change="getStates($event.target.value)" class="form-control @error('selectedCountry') is-invalid @enderror">
        <option value="" disabled>Choose Country</option>
        @foreach ($countries as $country)
            <option value="{{ $country }}">{{ $country }}</option>
        @endforeach
    </select>
    {{-- <div class="form-floating-icon">
        <i data-feather="globe"></i>
    </div> --}}
    @error('selectedCountry')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

@if ( !is_null($selectedCountry))
    <div class="form-floating form-floating-custom mb-4">
        <label class="control-label">State</label>
        <select id="input-state" wire:model="selectedState" class="form-control select2 @error('selectedState') is-invalid @enderror">
            <option value="" disabled>Choose State</option>
            @foreach ($states as $state)
                <option value="{{ $state }}">{{ $state }}</option>
            @endforeach
        </select>
        <div class="form-floating-icon">
            <i data-feather="home"></i>
        </div>
        @error('selectedState')
            <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
@endif
