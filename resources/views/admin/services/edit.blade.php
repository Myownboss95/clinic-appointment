@extends('layouts.app')

@section('content')
   
    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            <x-page-header title="Edit Service" />
             <form action="{{roleBasedRoute('services.update', [$service->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    @include('admin.services.fields')
                </div>
            </div>

            <div class="card-footer">
                <button class="btnb btn-primary" type="submit">Save</button>
                <a href="{{ roleBasedRoute('services.index') }}" class="btn btn-default">Cancel</a>
            </div>

        </form>

        </div>
    </div>
@endsection
