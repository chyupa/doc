<?php namespace Doc\Http\Controllers;

use Doc\Http\Requests;

use Illuminate\Http\Request;
use Doc\Document;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller {

	public function __construct()
  {
    $this->middleware('admin');
  }

  public function getDocument( Document $doc, Request $request )
  {
    return Response::json(['doc_body' => $doc->body]);
  }

}
