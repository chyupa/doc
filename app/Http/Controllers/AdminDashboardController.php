<?php namespace Doc\Http\Controllers;

use Doc\Category;
use Doc\Http\Requests\CreateUserRequest;
use Doc\Http\Requests\EditUserRequest;
use Doc\Http\Requests\Request;
use Doc\Role;
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
    $categories = ['' => 'Please select a category'];
    $categories += Category::lists('name', 'id');
    $roles = ['' => 'Please select a role'];
    $roles += Role::lists('name', 'id');

    return view('admin.user.create_user', compact('roles', 'categories'));
  }
  public function postCreateUser( CreateUserRequest $request)
  {
//    dd($request->all());

    User::create($request->all());

//    $categories = $request->get('cat');
//
//    foreach($categories as $cat)
//    {
//      $user->categories()->attach($cat);
//    }

    return redirect()->route('admin.get.users');

  }

  public function showUsers()
  {
    $users = User::where('role_id', '<>', 1)->get();
    return view('admin.user.users', compact('users'));
  }

  public function getEditUser( User $user )
  {
    $categories = ['' => 'Please select a category'];
    $categories += Category::lists('name', 'id');

    $roles = ['' => 'Please select a role'];
    $roles += Role::lists('name', 'id');

    return view('admin.user.edit_user', compact('user', 'roles', 'categories'));
  }

  public function postEditUser( User $user, EditUserRequest $request )
  {
    $args = $request->all();
    /**
     * if the password field is null then don't change it
     */
    if( $args['password'] == '' )
      unset( $args['password'] );

    $user->update( $args );
    return redirect()->route('admin.get.users');
  }

}
