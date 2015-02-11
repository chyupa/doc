<?php namespace Doc\Http\Controllers;

use Doc\Http\Requests\CreateUserRequest;
use Doc\Http\Requests\EditUserRequest;
use Doc\Http\Requests\Request;
use Doc\User;

class AdminDashboardController extends Controller {

	public function __construct()
  {
    $this->middleware('admin');
  }

  public function getDashboard()
  {
    return view('admin.dashboard');
  }

  public function getCreateUser()
  {
    $roles = ['' => 'Please select a role'];
    $roles += \Doc\UserRoles::lists('name', 'id');

    return view('admin.create_user', compact('roles'));
  }
  public function postCreateUser( CreateUserRequest $request)
  {
    User::create($request->all());

    return redirect()->route('admin.get.dashboard');

  }

  public function showUsers()
  {
    $users = User::all();
    return view('admin.users', compact('users'));
  }

  public function getEditUser( User $user )
  {
    $roles = ['' => 'Please select a role'];
    $roles += \Doc\UserRoles::lists('name', 'id');

    return view('admin.edit_user', compact('user', 'roles'));
  }

  public function postEditUser( User $user, EditUserRequest $request )
  {
    /**
     * TODO: don't update the password field or don't show it in the form
     */
    $user->update( $request->all() );
//    dd($request->all());
    return redirect()->route('admin.get.users');
  }

}
