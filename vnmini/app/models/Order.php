<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Order extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'code', 'value', 'discount', 'status', 'money_ship'];
    protected $dates = ['deleted_at'];

    public function orderproducts()
    {
        return $this->hasMany('OrderProduct', 'order_id', 'id');
    }
}