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

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Dial Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dial_code', 'Dial Code:') !!}
    {!! Form::text('dial_code', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Currency Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_name', 'Currency Name:') !!}
    {!! Form::text('currency_name', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Currency Symbol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_symbol', 'Currency Symbol:') !!}
    {!! Form::text('currency_symbol', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Currency Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_code', 'Currency Code:') !!}
    {!! Form::text('currency_code', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>