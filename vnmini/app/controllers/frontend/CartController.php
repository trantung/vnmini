<?php

class CartController extends \FrontendController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        // Session::forget('customer');
        // Cart::destroy();
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
        $customer = Session::get('customer', null);
        if(is_null($customer)){
            Session::put('customer', $data);
        }
        return Redirect::route('cart.order.add');
    }
    public function getCreateOrder(){
        $customer = Session::get('customer');
        $items = Cart::content();
        $order = [];
        //count sp thuong
        $number = returnDiscount($items)[2];
        //neu sl sp thuong >=2 xu ly (order_discount)
        $value_discount = CommonOrder::orderDiscount($items, $number);
        //gia tri nguyen goc
        $value_origin = Cart::total();
        //gia tri thuc
        $value = $value_origin - $value_discount;
        return View::make('frontend.carts.index')->with(compact('customer', 'value', 'value_origin', 'value_discount'));
    }

    public function postCreateOrder(){
        $customer = Session::get('customer', null);
        if(!is_null($customer)){
            DB::beginTransaction();
            try {
                $note = $customer['note'];
                unset($customer['note']);
                $customerId = Common::create($customer, 'customer');
                $items = Cart::content();
                $order['value_origin'] = Input::get('value_origin');
                $order['value_discount'] = Input::get('value_discount');
                $order['value'] = Input::get('value');
                $order['status'] = NO_APPROVE;
                $code = date("YmdHis");
                $order['code'] = $code;
                $order['note'] = $note;
                $order['customer_id'] = $customerId;
                $orderId = Common::create($order, 'order');
                foreach($items as $item){
                    $input['product_id'] = $item->product->id;
                    $input['order_id'] = $orderId;
                    $input['product_quantity'] = $item->qty;
                    Common::create($input, 'orderProduct');
                }
                //send email
                $data = [
                        'items' => Cart::content(),
                        'order' => $order
                    ];
                Mail::send('emails.email', $data, function($message) use ($customer, $data){
                    $message->to($customer['email'])
                            ->subject(SUBJECT_EMAIL);
                });
                Cart::destroy();
                Session::forget('customer');
                DB::commit();
                $file_path = public_path().'/orders.xlsx';
                CommonOrder::writeExcel($file_path, $orderId);
                return View::make('frontend.carts.cart_complete')->with(compact('code'));
            } catch (\Exception $e) {
                DB::rollback();
                return false;
            }
        }
        return Redirect::route('frontend.product.index');
    }

    public function test()
    {
        // dd(123);
        $data = [];
        Mail::send('emails.template', $data, function($message){
            // dd(5555);
            $message->to('trantunghn196@gmail.com');
                    // ->subject(SUBJECT_EMAIL);
        });
        dd(345);
    }
}
