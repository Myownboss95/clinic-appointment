<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Foundation\Auth\RegistersUsers;


class HomeController extends Controller
{

use RegistersUsers;


    
    public function index(){
        return view('home.landing', [
            'services' => Service::all()
        ]);
    }

    public function getAllSubservices(string $slug)
    {
        
        return view('home.subservices', [
            'services' =>  Service::where('slug', $slug)->with('sub_service')->first()
        ]);
    }

    public function register(){
        return view('home.register');
    }

        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return UserStage::create([
            'user_id' => $user->id,
            'sub_service_id' => $data['email'],
            'service_id' => Hash::make($data['password']),
            'log' => 'Log',
        ]);
    }
}
