<?php namespace Doc\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Doc\Document;
use Doc\Http\Requests;

use Doc\Http\Requests\GeneratePDFRequest;
use Doc\User;
use Doc\Variable;

class GeneratePDFController extends Controller {

	public function __construct()
  {
    $this->middleware('admin');
  }

  public function index()
  {
    $users = User::where('role_id', '<>', 1)->with('category')->get();
//    dd($users->category->documents->toArray());
    return view('admin.pdf.index', compact('users'));
  }

  public function getGenerate(User $user, Document $doc)
  {
    return view('admin.pdf.generate', compact('user', 'doc'));
  }

  public function postGenerate( User $user, Document $doc, GeneratePDFRequest $request )
  {
//    dd($request->all());
    $inputs = $request->get('input');
//    dd($inputs);
    foreach( $inputs as $key=>$val )
    {
      $this->validate($request,[
        "input.{$key}" => 'required'
      ]);
    }

    $replace_what = [];
    $replace_with = [];
    foreach( $inputs as $key=>$val )
    {
      $var = Variable::find($key);
      $replace_what[] = $var->var;
      $replace_with[] = $val;
    }

    $html = str_replace( $replace_what, $replace_with, $request->body );

    $pdf = \App::make('dompdf');
    $pdf->loadHTML($html);
    return $pdf->download($doc->name . Carbon::now() . '.pdf');

    /**
     * test test
     */

  }

}
