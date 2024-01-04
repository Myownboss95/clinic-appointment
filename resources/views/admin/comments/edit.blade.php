@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Comment</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {{-- {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'patch']) !!} --}}
            <form action="{{ roleBasedRoute('comments.update', $comment->id)}} " method="post">
                @csrf
                @method('PUT')
            <div class="card-body">
                <div class="row">
                    @include('admin.comments.fields')
                </div>
            </div>
    
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('staff.comments.index') }}" class="btn btn-default">Cancel</a>
            </div>
        
        </form>
            


            {{-- {!! Form::close() !!} --}}

        </div>
    </div>
@endsection
