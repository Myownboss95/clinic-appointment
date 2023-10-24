<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_service_id', 'Sub Service Id:') !!}
    {!! Form::number('sub_service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Service Id:') !!}
    {!! Form::number('service_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Log Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('log', 'Log:') !!}
    {!! Form::textarea('log', null, ['class' => 'form-control']) !!}
</div>