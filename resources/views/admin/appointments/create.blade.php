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
                        
                        
                        <select name="user_id" id="user" class="form-control">
                            {{-- <option>Select User</option> --}}
                            @foreach ($users as $user)
                                <option value={{ $user->id }}>{{ $user->last_name . ' ' . $user->first_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sub Service Id Field -->
                    <div class="mb-3">
                        <label for="service">Service</label>
                        <select name="sub_service_id" id="service" class="form-control">
                            <option>Select Service</option>

                            @foreach ($services as $service)
                                <option value={{ $service->id }}>{{ $service->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    @push('page_scripts')
                        
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/2.8.0/slimselect.min.css" integrity="sha512-QhrDqeRszsauAfwqszbR3mtxV3ZWp44Lfuio9t1ccs7H15+ggGbpOqaq4dIYZZS3REFLqjQEC1BjmYDxyqz0ZA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/2.8.0/slimselect.min.js" integrity="sha512-mG8eLOuzKowvifd2czChe3LabGrcIU8naD1b9FUVe4+gzvtyzSy+5AafrHR57rHB+msrHlWsFaEYtumxkC90rg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    
                        <script>
                        new SlimSelect({
                            select: "#user"
                        });
                        </script>
                    @endpush
                    {!! Form::submit('Next', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ roleBasedRoute('appointments.index') }}" class="btn btn-default">Cancel</a>
                </form>
            </div>
            </div>




        </div>


    </div>
@endsection
