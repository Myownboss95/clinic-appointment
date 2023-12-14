<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Iso Code2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iso_code2', 'Iso Code2:') !!}
    {!! Form::text('iso_code2', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Iso Code3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iso_code3', 'Iso Code3:') !!}
    {!! Form::text('iso_code3', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Num Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_code', 'Num Code:') !!}
    {!! Form::number('num_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Symbol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_symbol', 'Currency Symbol:') !!}
    {!! Form::text('currency_symbol', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>