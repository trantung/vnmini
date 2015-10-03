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
}