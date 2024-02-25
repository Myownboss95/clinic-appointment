@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create General Setting</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'admin.settings.store']) !!}

            <div class="card-body">

                <div class="row">

                    <div class="form-group col-sm-6 mb-3">
                        <label for="app_name">App Name</label>
                        <input type="text" name="app_name" class="form-control  @error('app_name') is-invalid @enderror"
                            value="{{ old('app_name', $app_name) }}" id="app_name">
                        @error('app_name')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="app_address">App Address</label>
                        <input type="text" name="app_address" class="form-control  @error('app_address') is-invalid @enderror"
                            value="{{ old('app_address', $app_address) }}" id="app_address">
                        @error('app_address')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="hero">Website Hero</label>
                        <input type="text" name="hero" class="form-control  @error('hero') is-invalid @enderror"
                            value="{{ old('hero', $hero) }}" id="hero">
                        @error('hero')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="site_description">Website Description</label>
                        <textarea name="site_description" class="form-control @error('site_description') is-invalid @enderror" id="site_description">{{ old('site_description', $site_description) }}</textarea>

                        @error('site_description')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="name">Ref Bonus</label>
                        <input type="text" name="ref_bonus" class="form-control  @error('ref_bonus') is-invalid @enderror"
                            value="{{ old('ref_bonus', $ref_bonus) }}">
                        @error('ref_bonus')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="name">Site Phone</label>
                        <input type="text" name="site_phone" class="form-control  @error('site_phone') is-invalid @enderror"
                            value="{{ old('site_phone', $site_phone) }}">
                        @error('site_phone')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="name">Site Email</label>
                        <input type="text" name="site_email" class="form-control  @error('site_email') is-invalid @enderror"
                            value="{{ old('site_email', $site_email) }}">
                        @error('site_email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="name">Site Linkedin</label>
                        <input type="text" name="site_linkedin" class="form-control  @error('site_linkedin') is-invalid @enderror"
                            value="{{ old('site_linkedin', $site_linkedin) }}">
                        @error('site_linkedin')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="name">Site Twitter</label>
                        <input type="text" name="site_twitter" class="form-control  @error('site_twitter') is-invalid @enderror"
                            value="{{ old('site_twitter', $site_twitter) }}">
                        @error('site_twitter')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="name">Site Instagram</label>
                        <input type="text" name="site_instagram" class="form-control  @error('site_instagram') is-invalid @enderror"
                            value="{{ old('site_instagram', $site_instagram) }}">
                        @error('site_instagram')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6 mb-3">
                        <label for="name">Site Facebook</label>
                        <input type="text" name="site_facebook" class="form-control  @error('site_facebook') is-invalid @enderror"
                            value="{{ old('site_facebook', $site_facebook) }}">
                        @error('site_facebook')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                   

                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
