@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Stage</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <x-page-header title="Create Stage" />
            <form action="{{roleBasedRoute('stages.store')}}" method="POST">
                @csrf
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
