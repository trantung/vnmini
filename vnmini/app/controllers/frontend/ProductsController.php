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
	public function showName($name,$id)
	{
		$product = Product::findOrFail($id);
		$product_relates = CommonProduct::getRelateProduct($product);
		$promotion = Promotion::findOrFail(1);
		return View::make('frontend.products.show', compact('product', 'product_relates', 'promotion'));
	}

	public function getProductBySort($name, $id){
		$sort = Category::findOrFail($id);
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
		$results = CommonProduct::search($input);
		return View::make('frontend.search')->with(compact('results'));
	}
	public function searchNew()
	{
		$input = Input::all();
		if (!$input['name']) {
			$news = AdminNew::orderBy('created_at', 'DESC')->paginate(PAGINATE_NEWS);
		}
		else {
			$news = AdminNew::where('title', 'LIKE', '%'.$input['name'].'%')
					->orderBy('created_at', 'DESC')->paginate(PAGINATE_NEWS);
		}
		return View::make('frontend.search_new')->with(compact('news'));
	}

	public function postComment($product_id){
		$input = Input::all();
		$product = Product::findOrFail($product_id);
		$name_seo = CommonProduct::getNameSeo($product->name_seo);
		Common::create($input, 'comment');
		return Redirect::route('frontend.product.show', [$name_seo,$product_id])->with(['message'=>'Cảm ơn bạn đã comment cho chúng tôi!']);
	}

	public function getProductByCategory($sort_name,$sort_id, $cate_id, $cate_name){
		
		$sort = Category::findOrFail($sort_id);

		if($cate_id !=0){
			$category = Category::findOrFail($cate_id);
			$products = $category->products()->paginate(PAGINATE_PRODUCT);
		}
		else{
			$category_ids = CommonSort::getCategoryId($sort->id);
			$products = CommonProduct::getAllProduct($category_ids, PAGINATE_PRODUCT);
		}

		$categories = $sort->categories;
		return View::make('frontend.categories.show')->with(compact('products', 'categories', 'sort'));
	}
}
