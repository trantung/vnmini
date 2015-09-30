<?php

class CartController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('frontend.carts.index');
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
		$item = Cart::get($id);
        if(is_null($item)){
            return Response::json(['error'=>'Không tồn tại sản phẩm']);
        }
		Cart::update($id, $data['quantity']);
        return Response::json(['success'=>'Cập nhật thành công!', 'total'=>Cart::count()]);
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

    public function postInfoCustomer(){

        $data = Input::all();
        $customer = new Customer;
        $customer->fullname = $data['name'];
        $customer->email = $data['email'];
        $customer->address = $data['address'];
        $customer->phone = $data['phone'];
        $customer->note = $data['note'];
        $customer->save();

        return View::make('frontend.carts.index')->with(compact('customer'));
    }

}
