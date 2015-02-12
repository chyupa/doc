<?php namespace Doc\Http\Controllers;

use Doc\Category;
use Doc\Doc;
use Doc\DocVar;
use Doc\Http\Requests;

use Doc\Http\Requests\CreateDocRequest;

class DocsController extends Controller {

	public function __construct()
	{
		$this->middleware('admin');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$docs = Doc::all();
		return view('admin.doc.docs', compact('docs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all();
//		dd($categories);
		return view('admin.doc.create_doc', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateDocRequest $request
	 * @return Response
	 */
	public function store( CreateDocRequest $request )
	{
		$inputs = $request->get('input');

		foreach( $inputs as $key=>$val )
		{
			$this->validate($request, [
				"input.{$key}.0" => 'required',
				"input.{$key}.1" => 'required'
			]);
		}

		$doc = Doc::create($request->all());

		$categories = $request->get('cat');

		foreach($categories as $cat)
		{
			$doc->categories()->attach($cat);
		}
		$doc_inputs = [];
		foreach($inputs as $input)
		{
			$args = [
				'name' => $input[0],
				'var' => $input[1]
			];
			$doc_var = DocVar::create($args);
			$doc_inputs[] = $doc_var->id;
		}

		$doc->vars()->attach($doc_inputs);

		return redirect()->route('admin.doc.index');
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
	 * @param Doc $doc
	 * @return Response
	 * @internal param int $id
	 */
	public function edit(Doc $doc)
	{
		$categories = Category::all();
//		dd($doc);
		$doc = $doc->with(['categories', 'vars'])->first();
//		dd($doc);
		$no_of_vars = $doc->vars()->count();
//		dd($no_of_vars);
		$vars = $doc->vars;
//		dd($vars);
		return view('admin.doc.edit_doc', compact('doc', 'categories', 'no_of_vars', 'vars'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Doc $doc
	 * @return Response
	 * @throws \Exception
	 * @internal param int $id
	 */
	public function destroy(Doc $doc)
	{
		$doc->delete();
		return redirect()->route('admin.doc.index');
	}

}
