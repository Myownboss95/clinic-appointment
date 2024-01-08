@extends('layouts.app')

@section('content')
    

    <div class="content px-3">

        @include('adminlte-templates::common.errors')
       
        <div class="card">
            <x-page-header title="Create Service" />
            <form action="{{roleBasedRoute('services.store')}}" method="POST">
                @csrf
                
            <div class="card-body">

                <div class="row">
                    @include('admin.services.fields')
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('staff.services.index') }}" class="btn btn-default">Cancel</a>
            </div>

        </form>  

        </div>
    </div>
@endsection
