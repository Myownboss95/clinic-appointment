<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $appointment->user_id }}</p>
</div>

<!-- Sub Service Id Field -->
<div class="col-sm-12">
    {!! Form::label('sub_service_id', 'Sub Service Id:') !!}
    <p>{{ $appointment->sub_service_id }}</p>
</div>

<!-- Start Time Field -->
<div class="col-sm-12">
    {!! Form::label('start_time', 'Start Time:') !!}
    <p>{{ $appointment->start_time }}</p>
</div>

<!-- End Time Field -->
<div class="col-sm-12">
    {!! Form::label('end_time', 'End Time:') !!}
    <p>{{ $appointment->end_time }}</p>
</div>

<!-- Stage Id Field -->
<div class="col-sm-12">
    {!! Form::label('stage_id', 'Stage Id:') !!}
    <p>{{ $appointment->stage_id }}</p>
</div>

