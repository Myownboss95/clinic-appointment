<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $userStage->user_id }}</p>
</div>

<!-- Sub Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('sub_service_id', 'Sub Service Id:') !!}
    <p>{{ $userStage->sub_service_id }}</p>
</div>

<!-- Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('service_id', 'Service Id:') !!}
    <p>{{ $userStage->service_id }}</p>
</div>

<!-- Log Field -->
<div class="col-sm-12">
    {!! Form::label('log', 'Log:') !!}
    <p>{{ $userStage->log }}</p>
</div>

