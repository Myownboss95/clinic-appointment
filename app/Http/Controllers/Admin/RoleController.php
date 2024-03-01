<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Response;

class RoleController extends AppBaseController
{
    /** @var RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleRepository->all();

        return view('admin.roles.index')
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        toastr()->timeOut(10000)->addSuccess('Role saved successfully.');

        return redirect(roleBasedRoute('roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            toastr()->timeOut(10000)->addError('Role not found');

            return redirect(roleBasedRoute('roles.index'));
        }

        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            toastr()->timeOut(10000)->addError('Role not found');

            return redirect(roleBasedRoute('roles.index'));
        }

        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            toastr()->timeOut(10000)->addError('Role not found');

            return redirect(roleBasedRoute('roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);

        toastr()->timeOut(10000)->addSuccess('Role updated successfully.');

        return redirect(roleBasedRoute('roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int  $id
     * @return Response
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            toastr()->timeOut(10000)->addError('Role not found');

            return redirect(roleBasedRoute('roles.index'));
        }

        $this->roleRepository->delete($id);

        toastr()->timeOut(10000)->addSuccess('Role deleted successfully.');

        return redirect(roleBasedRoute('roles.index'));
    }
}
