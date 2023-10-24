<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::textarea('value', null, ['class' => 'form-control']) !!}
</div>