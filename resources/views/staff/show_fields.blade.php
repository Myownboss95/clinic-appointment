<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $staff->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $staff->email }}</p>
</div>


<!-- Role Id Field -->
<div class="col-sm-12">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{{ role($staff->role_id) }}</p>
</div>


<!-- Gender Field -->
<div class="col-sm-12">
    {!! Form::label('login_count', 'Login Count:') !!}
    <p>{{ $staff->login_count }}</p>
</div>


