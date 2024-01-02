@include('adminlte-templates::common.errors')
<div class="col-md-6">
    <form class="" method="post" action="{{ roleBasedRoute('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="example-text-input" class="form-label">First
                Name</label>
            <input class="form-control" type="text" value="{{ $user->first_name }}" id="example-text-input"
                name="first_name">

        </div>
        <div class="mb-3">
            <label for="example-text-input" class="form-label">Last
                Name</label>
            <input class="form-control" type="text" value="{{ $user->last_name }}" id="example-text-input"
                name="last_name">
        </div>
        <div class="mb-3">
            <label for="example-date-input" class="form-label">Date</label>
            <input class="form-control" name="dob" type="date" value="{{ $user->dob?->format('Y-m-d') }}"
                id="example-date-input">
        </div>

        <div class="mb-3">
            <label for="example-tel-input" class="form-label">Telephone</label>
            <input class="form-control" name="phone_number" type="tel"
                value="{{ old('phone_number', $user->phone_number) }}" id="example-tel-input">
        </div>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="Gender" class="form-label">Gender</label>
        <select name="gender" id="gender" class="form-select" required>
            <option value="">Select</option>
            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
        </select>

    </div>
    <livewire:user-country-state-selector :userCountry="$user->country" :userState="$user->state" />

    <div class="mb-3">
        <label for="example-text-input" class="form-label">City</label>
        <input class="form-control" type="text" value="{{ $user->city }}" id="example-text-input" name="city">
    </div>

</div>

<div class="mt-4 d-flex justify-content-left">
    <button type="submit" class="btn btn-primary w-md">Update
        User Details</button>
</div>
</form>
