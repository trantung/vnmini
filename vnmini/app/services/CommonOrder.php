<?php
use Carbon\Carbon;
class CommonOrder
{
	public static function valueOrigin($value)
	{
		// $valueOrigin = Order::findOrFail($orderId)->value_origin;
		// return $valueOrigin;
		return $value;
	}

	public static function valueDiscount($value)
	{
		$valueOrigin = self::valueOrigin($value);
		$discountCommon = Discount::findOrFail(1)->percentage;
		// $discountOrder = Order::findOrFail($orderId)->discount;
		$valueDiscountCommon =  $valueOrigin - ($valueOrigin * $discountCommon/100);
		// $valueDiscount = $valueDiscountCommon - ($valueDiscountCommon * $discountOrder/100);
		$valueDiscount = $valueDiscountCommon;
		return $valueDiscount;
	}

	public static function valueReal($orderId)
	{
		$valueDiscount = self::valueDiscount($orderId);
		$valueOrigin = self::valueOrigin($orderId);
		// $moneyShip = Order::findOrFail($orderId)->money_ship;
		// $valueReal = ($valueOrigin - $valueDiscount) + $moneyShip;
		$valueReal = $valueOrigin - $valueDiscount;
		return $valueReal;
	}

	public static function orderDiscount($items, $number)
	{
		if ($number > 1) {
            $value_discount = 0;
            foreach ($items as $key => $item) {
                if (empty($item->product->new_price)) {
                    $value_discount += ($item->product->origin_price)* ($item->qty) * (Discount::findOrFail(1)->percentage)/100;
                }
            }
            return $value_discount;
        }
        return 0;
	}

	public static function getStatusOrder()
	{
		$statusOrder = [
						NO_APPROVE => 'Chưa xử lý',
						APPROVE => 'Đã xử lý',
						NO_SHIP => 'Chưa chuyển hàng',
						SHIP => 'Đã chuyển hàng',
						PAY => 'Thanh toán',
			];
		return $statusOrder;
	}

	public static function getQuantityProduct($orderId, $productId)
	{
		$orderProduct = OrderProduct::where('product_id', $productId)->where('order_id', $orderId)->first();
		$quantity = OrderProduct::findOrFail($orderProduct->id)->product_quantity;
		return $quantity;
	}

	public static function updateOrder($input, $id)
	{
		$customerId = Order::findOrFail($id)->customer_id;
		$inputOrder = [
				'code' => Input::get('code'),
				'note' => Input::get('note'),
				'value_origin' => Input::get('value_origin'),
				'value_discount' => Input::get('value_discount'),
				'value' => Input::get('value'),
				'status' => Input::get('status'),
			];
		$customerInput = [
				'fullname' => Input::get('fullname'),
				'phone' => Input::get('phone'),
				'email' => Input::get('email'),
				'address' => Input::get('address'),
			];
		$productInput = [
				'name' => Input::get('name'),
				'code' => Input::get('productCode'),
			];
		$orderProduct = Input::except('_method', '_token', 'code', 'fullname', 'phone', 'email', 'address', 'note', 'value_discount', 'value', 'value_origin', 'status', 'updated_at');
        DB::beginTransaction();
        try {
        	Common::update($id, $inputOrder);
        	Customer::findOrFail($customerId)->update($customerInput);
        	foreach ($orderProduct as $key => $value) {
        		$orderProductId = OrderProduct::where('product_id', $key)->where('order_id', $id)->first()->id;
        		OrderProduct::findOrFail($orderProductId)->update(['product_quantity' => $value]);
        	    	$quantityOld = Product::findOrFail($key)->quantity;
        	    	$quantityNew = $quantityOld - $value;
        	    	if ($quantityNew < 0) {
        	    		return false;
        	    	}
        	    	if ($inputOrder['status'] == SHIP) {
        	    		Product::findOrFail($key)->update(['quantity' => $quantityNew]);
        			}
        	}
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
        return $id;
	}

	public static function getSearchResult($input)
	{
		$orders = Order::where(function ($query) use ($input) {
			if ($input['status']) {
				$query->where('status', $input['status']);
			}
			if ($input['code']) {
				$query->where('code', 'LIKE', '%'.$input['code'].'%');
			}
			if ($input['startDate']) {
                $query->where('created_at', '>=', $input['startDate']);
			}
			if ($input['endDate']) {
                $query->where('created_at', '<=', $input['endDate']);
			}
		})->orderBy('created_at', 'desc')->paginate(PAGINATE_ORDER);
		return $orders;
	}

	public static function writeExcel($file_path, $order_id, $currentRow = NULL){

		$order = Order::findOrFail($order_id);
		$objPHPExcel = \PHPExcel_IOFactory::load($file_path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        if(!is_null($currentRow)){
        	$newRow = $currentRow;
        }
        else{
        	$newRow = $highestRow+1;
        }
        $orderProducts = $order->orderproducts;
        $text = "";
        $money = $order->value_origin;
        $discount = $order->value_discount;
        $create_date = date('Y-m-d',strtotime($order->created_at));
        $updated_date = date('Y-m-d',strtotime($order->updated_at));
        foreach($order->orderproducts as $key => $orderProduct){

			$text.=$orderProduct->product->name.':'.CommonOrder::getQuantityProduct($order->id, $orderProduct->product->id).', ';
        }
        $text.='Giảm giá: '.$discount.', '.'Tổng tiền: '.$money;
        $objWorksheet->SetCellValue(ORDER_STT.$newRow, $newRow);
        $objWorksheet->SetCellValue(ORDER_CODE.$newRow, $order->code);
        $objWorksheet->SetCellValue(ORDER_STATUS.$newRow, $order->status);
        $objWorksheet->SetCellValue(ORDER_USER_ADDRESS.$newRow, $order->customer->address);
        $objWorksheet->SetCellValue(ORDER_USER_PHONE.$newRow, $order->customer->phone);
        $objWorksheet->SetCellValue(ORDER_USER_EMAIL.$newRow, $order->customer->email);
        $objWorksheet->SetCellValue(ORDER_DETAIL.$newRow, $text);
        $objWorksheet->SetCellValue(ORDER_CREATED_DATE.$newRow, $create_date);
        $objWorksheet->SetCellValue(ORDER_UPDATED_DATE.$newRow, $updated_date);
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($file_path);

        return 1;
	}

	public static function updateExcel($file_path, $order_id){
		$order = Order::findOrFail($order_id);
		$objPHPExcel = \PHPExcel_IOFactory::load($file_path);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestRow = $objWorksheet->getHighestRow();
        $code = (float) $order->code;
        $currentRow = null;
        $data = $objWorksheet->toArray(null, true, true, true);
        for($row = 2; $row<=$highestRow; $row++){
            if($data[$row][ORDER_CODE] == $code ){
            	$currentRow = $row;
            	break;
            }

        }

		if( !is_null($currentRow))
        	CommonOrder::writeExcel($file_path, $order_id, $currentRow);

       return 1;
	}
}