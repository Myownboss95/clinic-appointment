<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- City Id Field -->
<div class="col-sm-12">
    {!! Form::label('city_id', 'City Id:') !!}
    <p>{{ $user->city_id }}</p>
</div>

<!-- State Id Field -->
<div class="col-sm-12">
    {!! Form::label('state_id', 'State Id:') !!}
    <p>{{ $user->state_id }}</p>
</div>

<!-- Country Id Field -->
<div class="col-sm-12">
    {!! Form::label('country_id', 'Country Id:') !!}
    <p>{{ $user->country_id }}</p>
</div>

<!-- Role Id Field -->
<div class="col-sm-12">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{{ $user->role_id }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Gender Field -->
<div class="col-sm-12">
    {!! Form::label('gender', 'Gender:') !!}
    <p>{{ $user->gender }}</p>
</div>

<!-- Balance Field -->
<div class="col-sm-12">
    {!! Form::label('balance', 'Balance:') !!}
    <p>{{ $user->balance }}</p>
</div>

<!-- Life Time Balance Field -->
<div class="col-sm-12">
    {!! Form::label('life_time_balance', 'Life Time Balance:') !!}
    <p>{{ $user->life_time_balance }}</p>
</div>

<!-- Referral Code Field -->
<div class="col-sm-12">
    {!! Form::label('referral_code', 'Referral Code:') !!}
    <p>{{ $user->referral_code }}</p>
</div>

<!-- Referred By User Id Field -->
<div class="col-sm-12">
    {!! Form::label('referred_by_user_id', 'Referred By User Id:') !!}
    <p>{{ $user->referred_by_user_id }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

