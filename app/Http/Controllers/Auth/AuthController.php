<?php namespace Doc\Http\Controllers\Auth;

use Doc\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	public $redirect_user_path;
	public $redirect_admin_path;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->redirect_user_path = route('user.get.dashboard');
		$this->redirect_admin_path = route('admin.get.dashboard');

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function postLogin( Request $request )
	{
		$this->validate($request, [
			'username' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('username', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			if( Auth::user()->isAdmin() )
			{
				return redirect()->intended($this->redirect_admin_path);
			}
			else
			{
				return redirect()->intended($this->redirect_user_path);

			}

		}

		return redirect($this->loginPath())
					->withInput($request->only('username'))
					->withErrors([
						'username' => 'These credentials do not match our records.',
					]);
	}

}
