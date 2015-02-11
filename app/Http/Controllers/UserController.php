<?php namespace Doc\Http\Controllers;

use Doc\Http\Requests;
use Doc\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function getDashboard()
  {
    return "This is the users dashboard!";
  }

}
