@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Appointment</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')








        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card p-5">
                <form action="{{ roleBasedRoute('appointments.store') }}" method="POST">
                    @csrf
                    <!-- User Id Field -->
                    <div class="mb-3">
                        <label for="user">User</label>
                        <select name="user_id" id="" class="form-control">
                            <option>Select User</option>
                            @foreach ($users as $user)
                                <option {{ $appointment->user?->id === $user->id ? 'selected' : null }}
                                    value={{ $user->id }}>{{ $user->last_name . ' ' . $user->first_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sub Service Id Field -->
                    <div class="mb-3">
                        <label for="user">Sub Service</label>
                        <select name="sub_service_id" id="" class="form-control">
                            <option>Select Subservice</option>

                            @foreach ($subServices as $subService)
                                <option {{ $appointment->subService === $subService->id ? 'selected' : null }}
                                    value={{ $subService->id }}>{{ $subService->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    @push('page_scripts')
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                            rel="stylesheet" />
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $('.js-example-basic-single').select2({
                                placeholder: "Search options",
                                minimumInputLength: 2,
                                caseSensitive: false
                            });
                        </script>
                    @endpush
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ roleBasedRoute('appointments.index') }}" class="btn btn-default">Cancel</a>
                </form>
            </div>
            </div>




        </div>


    </div>
@endsection
