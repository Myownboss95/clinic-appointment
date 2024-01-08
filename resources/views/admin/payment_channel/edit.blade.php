@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Sub Service</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            <x-page-header title="Edit Subservice" />
              <form action="{{roleBasedRoute('paymentChannels.update', [$paymentChannel->id])}}" method="POST">
                @csrf
                @method('PUT')
            <div class="card-body">
                <div class="row">
                    @include('admin.payment_channel.fields')
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ roleBasedRoute('paymentChannels.index') }}" class="btn btn-default">Cancel</a>
            </div>

              </form>

        </div>
    </div>
@endsection
