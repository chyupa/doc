<?php namespace Doc\Http\Controllers;

use Doc\Http\Requests;

use Doc\User;
use Illuminate\Support\Facades\Event;

class GeneratePDFController extends Controller {

	public function __construct()
  {
    $this->middleware('admin');
  }

  public function index()
  {
    $users = User::where('role_id', '<>', 1)->with('categories.doc')->find(2);
    dd($users);
    return view('admin.pdf.index', compact('users'));
  }

}
