<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ImageController extends Controller
{
    public function index(User $user){
        
        if($user->id === auth()->user()->id){
            return view('admin.image.index', compact("user"));
        }
        
        abort(403);
    }
}
