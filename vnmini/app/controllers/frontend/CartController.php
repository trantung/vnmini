<?php

class CartController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	 /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = Input::all();
        $err_msg = false;
        if(empty($data['quantity']))
        {
            $err_msg = true;
        }
        if(!empty($err_msg)){
            return Response::json(["error"=>'Số lượng không đúng']);
        }
        $product = Product::findOrFail($data['product_id']);
        $cartExists = Cart::search(['id' =>$product->id]);
        if($cartExists)
        {
            $cart = Cart::get($cartExists[0]);
            Cart::update($cartExists[0], $cart->qty+$data['quantity']);
        }
        else
        {
        	if(!empty($product->new_price)){
        		$price = $product->new_price;
        	}
        	else{
        		$price = $product->origin_price;
        	}
            Cart::associate('Product')->add(array('id'=>$product->id,
                            'name' => $product->name,
                            'qty' => $data['quantity'],
                            'price' => $price,
                            ));
        }
        $prduct_link = '<a href="'.route('frontend.product.show',['product_id'=>$product->id]).'">'.$product->name.'</a>';
        $link_to_cart = '<a href="'.route('cart.index').'">Giỏ hàng!</a>';
        $success = 'Thêm thành công'.$prduct_link.' vào '. $link_to_cart;
        $message=['success'=>$success];

        return Response::json($message);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		if(!$data['quantity']>0){
			return Response::json(['error'=>'Bạn phải chọn số lượng sản phẩm']);
		}
		$product = Product::find($id)->first();
		if(is_null($product)){
			
			return Response::json(['error'=>'Sản phẩm bạn đặt đã không còn!']);
		}

		$cart = new Cart;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
