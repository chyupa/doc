<?php namespace Doc\Http\Controllers;

use Doc\Http\Requests;
use Doc\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller {

	public function __construct()
  {
    $this->middleware('auth');
  }



}
