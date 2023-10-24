<!-- Model Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_name', 'Model Name:') !!}
    {!! Form::text('model_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', 'Model Id:') !!}
    {!! Form::number('model_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Staff User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('staff_user_id', 'Staff User Id:') !!}
    {!! Form::number('staff_user_id', null, ['class' => 'form-control']) !!}
</div>