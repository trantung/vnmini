<?php

class OrderController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::orderBy('created_at', 'desc')->paginate(PAGINATE_ORDER);
		return View::make('admin.order.index')->with(compact('orders'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
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
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);
		return View::make('admin.order.show')->with(compact('order'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::findOrFail($id);
		return View::make('admin.order.edit')->with(compact('order'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$orderId = CommonOrder::updateOrder($input, $id);
		if(!$orderId) {
			return Redirect::route('admin.order.edit', $id)->with('message', 'Lỗi: Số lượng sản phẩm đặt mua vượt quá số lượng trong kho/lỗi không mong muốn');
		}
		return Redirect::route('admin.order.index')->with('message', 'update hoá đơn thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Common::delete($id);
		return Redirect::route('admin.order.index')->with('message', 'Xoá thành công');
	}

	public function deleteProduct($id)
	{
		OrderProduct::find($id)->delete();
	}

}
