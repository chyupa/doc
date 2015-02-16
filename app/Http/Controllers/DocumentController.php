<?php namespace Doc\Http\Controllers;

use Doc\Category;
use Doc\Document;
use Doc\Http\Requests;

use Doc\Http\Requests\CreateDocRequest;
use Doc\Variable;

class DocumentController extends Controller {

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
		$docs = Document::all();
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
//		dd($request->all());
		$inputs = $request->get('input');

		foreach( $inputs as $key=>$val )
		{
			$this->validate($request, [
				"input.{$key}.name" => 'required',
				"input.{$key}.var" => 'required'
			]);
		}

		$doc = Document::create($request->all());

		$categories = $request->get('cat');

		foreach($categories as $cat)
		{
			$doc->categories()->attach($cat);
		}

		foreach($inputs as $input)
		{
      $input['document_id'] = $doc->id;
			Variable::create($input);

		}

		return redirect()->route('admin.doc.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Document $doc
	 * @return Response
	 * @internal param int $id
	 */
	public function show(Document $doc)
	{
		//
		dd($doc);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Document $doc
	 * @return Response
	 * @internal param int $id
	 */
	public function edit(Document $doc)
	{
//    dd($doc);
		$categories = Category::all();
		$doc_cat = $doc->categories;
		$no_of_vars = $doc->vars()->count();
		$vars = $doc->vars;
		return view('admin.doc.edit_doc', compact('doc', 'categories', 'no_of_vars', 'vars', 'doc_cat'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Document $doc
	 * @param CreateDocRequest $request
	 * @return Response
	 * @internal param int $id
	 */
	public function update(Document $doc, CreateDocRequest $request)
	{
		$inputs = $request->get('input');

		foreach( $inputs as $key=>$val )
		{
			$this->validate($request, [
				"input.{$key}.name" => 'required',
				"input.{$key}.var" => 'required'
			]);
		}
		$doc->categories()->detach();

		$categories = $request->get('cat');
		foreach($categories as $cat)
		{
			$doc->categories()->attach($cat);
		}
//    dd($doc->vars()->count());
		$doc->vars()->delete();

		foreach($inputs as $input)
		{
      $input['document_id'] = $doc->id;
			Variable::create($input);
		}

		$doc->update($request->all());

		return redirect()->route('admin.doc.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Document $doc
	 * @return Response
	 * @throws \Exception
	 * @internal param int $id
	 */
	public function destroy(Document $doc)
	{
		$doc->delete();
		return redirect()->route('admin.doc.index');
	}

}
