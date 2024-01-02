<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

function roleBasedRoute($routeName, $params = null)
{
    $userRoleId = auth()->user()->role_id;

    if ($userRoleId == 3) {
        return route('admin.'.$routeName, $params);
    }
    if ($userRoleId == 2) {
        return route('staff.'.$routeName, $params);
    }
    if ($userRoleId == 1) {
        return route('user.'.$routeName, $params);
    }

    return route($routeName, $params);
}

function role($role_id)
{
    if ($role_id == 3) {
        return 'admin';
    }
    if ($role_id == 2) {
        return 'staff';
    }

    return 'Customer';
}

function userName()
{
    return Str::substr(auth()->user()->first_name, 0, 9);
}

function formatDateTime($datetime)
{
    return Carbon::parse($datetime)->format('jS \of F, Y, \b\y g.ia');
}

function refCode()
{
    return config('app.url').'/ref/'.auth()->user()->referral_code;
}

function formatMoney($amount)
{
    return html_entity_decode('&#8358;').number_format($amount, 2, '.', ',');
}

function profilePicture(User $user)
{
    return $user->image
        ? asset("storage/{$user->image}")
        : asset('lineone/images/users/avatar-6.jpg'); // Replace with your default image path
}

function age($age)
{
    return $age->diff(Carbon::now())->format('%y years old');
}

function upperCase($string)
{
    return Str::ucfirst($string);
}
