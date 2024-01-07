{{-- @extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create User</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'admin.users.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('admin.users.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection --}}




@extends('layouts.auth')

@section('title', 'Add User')
@section('content')

    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0">Register a new User</h5>
        </div>
        
        <form class="mt-4 pt-2" method="POST" action="{{ roleBasedRoute('users.store') }}">
            @csrf
            <div class="form-floating form-floating-custom mb-4">
                <input type="text" class="form-control  @error('first_name') is-invalid @enderror"
                    value="{{ old('first_name') }}" id="input-first-name" placeholder="Enter First Name" name="first_name"
                    required>
                <div class="invalid-feedback">
                    Please Enter First Name
                </div>
                <label for="input-first-name">First Name</label>
                <div class="form-floating-icon">
                    <i data-feather="users"></i>
                </div>
                @error('first_name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating form-floating-custom mb-4">
                <input type="text" class="form-control  @error('last_name') is-invalid @enderror"
                    value="{{ old('last_name') }}" id="input-last-name" placeholder="Enter Last Name" name="last_name"
                    required>
                <div class="invalid-feedback">
                    Please Enter Last Name
                </div>
                <label for="input-last-name">Last Name</label>
                <div class="form-floating-icon">
                    <i data-feather="users"></i>
                </div>
                @error('last_name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating form-floating-custom mb-4">
                <input type="text" class="form-control  @error('phone_number') is-invalid @enderror"
                    value="{{ old('phone_number') }}" id="input-phone" placeholder="Enter Phone Number" name="phone_number"
                    required>
                <div class="invalid-feedback">
                    Please Enter Phone Number
                </div>
                <label for="input-phone">Phone Number</label>
                <div class="form-floating-icon">
                    <i data-feather="phone"></i>
                </div>
                @error('phone_number')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-floating form-floating-custom mb-4">
                <input type="text" class="form-control  @error('email') is-invalid @enderror" id="input-email"
                    placeholder="Enter Email" value="{{ old('email') }}" name="email">
                <label for="input-email">Email</label>
                <div class="form-floating-icon">
                    <i data-feather="mail"></i>
                </div>
                @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-floating form-floating-custom mb-4">
                <select class="form-control  @error('role_id') is-invalid @enderror" name="role_id" id="input-role_id"
                >
                <option value="">Choose Role</option>
                <option value="3">Admin</option>
                <option value="2">Staff</option>
                <option value="1">User</option>
            </select>
                <label for="input-role_id">Role</label>
                <div class="form-floating-icon">
                    <i data-feather="user"></i>
                </div>
                @error('role_id')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            
            {{-- <livewire:country-state-selector/>            --}}
            <div class="mb-3">
                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Save</button>
            </div>
        </form>


        
    </div>

@endsection

