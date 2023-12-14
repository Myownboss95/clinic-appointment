<?php

namespace App\Http\Controllers\Admin;

use Response;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Stage;

class CustomerController extends AppBaseController
{
    

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $defaultStage = Stage::with('users')->latest()->first();

        $customers = $defaultStage->users()->get();
        
        if(request()->stage) {
            $stage = Stage::where('slug', request()->category)->with('users')->get()->first();
            $customers = $stage->users()->get();
        }
        

        return view('admin.customers.index')
            ->with([
                'customers' => $customers,
                'stages' => Stage::all(),
                'defaultStage' => $defaultStage
            ]);
    }

    
}
