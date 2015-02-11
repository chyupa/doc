<?php namespace Doc\Http\Controllers;

use Doc\Category;
use Doc\Http\Requests;
use Doc\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();
		return view('admin.category.categories', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.category.create_category');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Requests\CreateCategoryRequest $request )
	{
		Category::create($request->all());
		return redirect()->route('admin.get.categories');
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
	 * @param  Category  $category
	 * @return Response
	 */
	public function edit(Category $category)
	{
		return view('admin.category.edit_category', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Category $category
	 * @return Response
	 * @internal param int $id
	 */
	public function update(Category $category, Requests\CreateCategoryRequest $request)
	{
		$category->update($request->all());

		return redirect()->route('admin.get.categories');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Category $category
	 * @return Response
	 * @internal param int $id
	 */
	public function destroy(Category $category)
	{
		$category->delete();
		return redirect()->route('admin.get.categories');
	}

}
