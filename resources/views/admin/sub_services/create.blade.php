@extends('layouts.app')

@section('content')
     

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <x-page-header title="Create Subservice" />
            <form action="{{roleBasedRoute('subServices.store')}}" method="POST" enctype="multipart/form-data"> 
                @csrf
            <div class="card-body">

                <div class="row">
                    @include('admin.sub_services.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ roleBasedRoute('subServices.index') }}" class="btn btn-default">Cancel</a>
            </div>

            </form>

        </div>
    </div>
@endsection
