<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $clinicUser->user_id }}</p>
</div>

<!-- Clinic Id Field -->
<div class="col-sm-12">
    {!! Form::label('clinic_id', 'Clinic Id:') !!}
    <p>{{ $clinicUser->clinic_id }}</p>
</div>

<!-- Role Field -->
<div class="col-sm-12">
    {!! Form::label('role', 'Role:') !!}
    <p>{{ $clinicUser->role }}</p>
</div>

