<div class="form-floating form-floating-custom mb-4">
    <select name="state" id="input-state" class="form-control form-select  @error('state') is-invalid @enderror value="{{ old('state') }}>
        <option value="">Choose State</option>
    </select>
    <label for="input-state">Current State</label>
    <div class="form-floating-icon">
        <i data-feather="home"></i>
    </div>
    @error('state')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-floating form-floating-custom mb-4">
    <select name="city" id="input-city" class="form-control form-select  @error('city') is-invalid @enderror value="{{ old('city') }}>
        <option value="">Choose City</option>
    </select>
    <label for="input-city">Current City</label>
    <div class="form-floating-icon">
        <i data-feather="home"></i>
    </div>
    @error('city')
        <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>