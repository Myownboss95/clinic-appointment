@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Sub Service</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            <x-page-header title="Create Payment Channel" />
            <form action="{{roleBasedRoute('paymentChannels.store')}}" method="POST"> 
                @csrf
            <div class="card-body">

                <div class="row">
                    @include('admin.payment_channel.fields')
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ roleBasedRoute('paymentChannels.index') }}" class="btn btn-default">Cancel</a>
            </div>

            </form>

        </div>
    </div>
@endsection
