<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of frontend.categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all();

		return View::make('frontend.categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new frontend.category
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('frontend.categories.create');
	}

	/**
	 * Store a newly created frontend.category in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Category::create($data);

		return Redirect::route('frontend.categories.index');
	}

	/**
	 * Display the specified frontend.category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::findOrFail($id);

		return View::make('frontend.categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified frontend.category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);

		return View::make('frontend.categories.edit', compact('category'));
	}

	/**
	 * Update the specified frontend.category in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$category->update($data);

		return Redirect::route('frontend.categories.index');
	}

	/**
	 * Remove the specified frontend.category from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Category::destroy($id);

		return Redirect::route('frontend.categories.index');
	}

}
