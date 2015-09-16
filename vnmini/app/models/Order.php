<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Order extends Model
{
	use SoftDeletingTrait;
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'code', 'value', 'discount', 'status'];

    public function orderproducts()
    {
        return $this->hasMany('OrderProduct', 'order_id', 'id');
    }
}