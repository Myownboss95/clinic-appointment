<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $passwordReset->email }}</p>
</div>

<!-- Token Field -->
<div class="col-sm-12">
    {!! Form::label('token', 'Token:') !!}
    <p>{{ $passwordReset->token }}</p>
</div>

