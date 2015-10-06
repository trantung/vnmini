<?php

class ProductsController extends \FrontendController {

	/**
	 * Display a listing of frontend.products
	 *
	 * @return Response
	 */
	public function index()
	{
		// $sorts = Sort::all(['name', 'id']);
		return View::make('frontend.products.index');
	}

	/**
	 * Show the form for creating a new frontend.product
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('frontend.products.create');
	}

	/**
	 * Store a newly created frontend.product in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Product::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Product::create($data);

		return Redirect::route('frontend.products.index');
	}

	/**
	 * Display the specified frontend.product.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
		$product_relates = CommonProduct::getRelateProduct($product);
		$promotion = Promotion::findOrFail(1);
		return View::make('frontend.products.show', compact('product', 'product_relates', 'promotion'));
	}

	public function getProductBySort($name, $id){
		$sort = Sort::findOrFail($id);
		return View::make('frontend.categories.show', compact('sort'));
	}

	public function getLienhe(){
		
		return View::make('frontend.lienhe');
	}

	public function getTintuc(){
		$news = AdminNew::orderBy('created_at', 'DESC')->paginate(PAGINATE_NEWS);
		$article = null;
		foreach ($news as $key =>$val) {
			if($key == 0){
				$article =$val;
			}
		}
		return View::make('frontend.tintuc')->with(compact('news', 'article'));
	}
	public function showTintuc($id){
		$news = AdminNew::orderBy('created_at', 'DESC')->paginate(PAGINATE_NEWS);
		$article = AdminNew::findOrFail($id);
		return View::make('frontend.tintuc')->with(compact('news', 'article'));
	}

	public function search()
	{
		$input = Input::all();
		// dd($input);
		// dd($name);
		$results = CommonProduct::search($input);
		return View::make('frontend.search')->with(compact('results'));
	}
	public function searchNew()
	{
		$input = Input::all();
		dd($input);
		// dd($name);
		return View::make('frontend.search_new')->with(compact('results'));
	}
}
