<?php
use Carbon\Carbon;
class CommonOrder
{
	public static function valueOrigin($orderId)
	{
		$valueOrigin = Order::findOrFail($orderId)->value_origin;
		return $valueOrigin;
	}

	public static function valueDiscount($orderId)
	{
		$valueOrigin = self::valueOrigin();
		$discountCommon = Discount::findOrFail(1)->percentage;
		$discountOrder = Order::findOrFail($orderId)->discount;
		$valueDiscountCommon =  $valueOrigin - ($valueOrigin * $discountCommon/100);
		$valueDiscount = $valueDiscountCommon - ($valueDiscountCommon * $discountOrder/100);
		return $valueDiscount;
	}

	public static function valueReal($orderId)
	{
		$valueDiscount = self::valueDiscount($orderId);
		$valueOrigin = self::valueOrigin($orderId);
		$moneyShip = Order::findOrFail($orderId)->money_ship;
		$valueReal = ($valueOrigin - $valueDiscount) + $moneyShip;
		return $valueReal;
	}
}