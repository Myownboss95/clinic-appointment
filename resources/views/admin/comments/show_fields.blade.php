<!-- Model Name Field -->
<div class="col-sm-12">
    {!! Form::label('model_name', 'Model Name:') !!}
    <p>{{ $comment->model_name }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', 'Model Id:') !!}
    <p>{{ $comment->model_id }}</p>
</div>

<!-- Body Field -->
<div class="col-sm-12">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $comment->body }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $comment->user_id }}</p>
</div>

<!-- Staff User Id Field -->
<div class="col-sm-12">
    {!! Form::label('staff_user_id', 'Staff User Id:') !!}
    <p>{{ $comment->staff_user_id }}</p>
</div>

