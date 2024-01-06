@extends('layouts.app')

@section('content')
    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            <x-page-header title="Edit Stage" />
             <form action="{{roleBasedRoute('stages.update', [$stage->id])}}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        @include('admin.stages.fields')
                    </div>
                </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>                
                <a href="{{ roleBasedRoute('stages.index') }}" class="btn btn-default">Cancel</a>
            </div>

             
        </form>

        </div>
    </div>
@endsection
