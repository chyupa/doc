<?php namespace Doc\Http\Controllers;

use Doc\Category;
use Doc\Http\Requests;
use Doc\Http\Controllers\Controller;

use Doc\Http\Requests\CreateRoleRequest;
use Doc\Role;
use Illuminate\Http\Request;

class RoleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::all();

		return view('admin.role.roles', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.role.create_role');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateRoleRequest $request
	 * @return Response
	 */
	public function store( CreateRoleRequest $request)
	{
		Role::create($request->all());

    return redirect()->route('admin.role.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Role $role
	 * @return Response
	 * @internal param int $id
	 */
	public function edit(Role $role)
	{
		return view('admin.role.edit_role', compact('role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Role $role
	 * @param CreateRoleRequest $request
	 * @return Response
	 * @internal param int $id
	 */
	public function update(Role $role, CreateRoleRequest $request)
	{
		$role->update( $request->all() );

    return redirect()->route('admin.role.index');
	}

  /**
   * Remove the specified resource from storage.
   *
   * @param Role $role
   * @return Response
   * @internal param int $id
   */
	public function destroy(Role $role)
	{
//    dd($role);
		$role->delete();

    return redirect()->route('admin.role.index');
	}

}
