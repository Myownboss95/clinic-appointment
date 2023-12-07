<?php 

use Illuminate\Support\Str;


    function roleBasedRoute($routeName)
    {
        $userRoleId = auth()->user()->role_id;

        if ($userRoleId == 3) {
            return route('admin.' . $routeName);
        }
        if ($userRoleId == 2) {
            return route('staff.' . $routeName);
        } 
            
        return route($routeName);
    }

    function role($role_id)
    {
        if ($role_id == 3) {
            return "Administrator";
        }
        if ($role_id == 2) {
            return "Staff";
        } 
            
        return "Customer";
    }

    function user_name()
    {
        return Str::substr(auth()->user()->name, 0, 9);
    }

    

