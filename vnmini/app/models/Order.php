<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Order extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'code', 'value', 'discount', 'status', 'money_ship', 'note', 'value_discount', 'value_origin'];
    protected $dates = ['deleted_at'];

    public function orderproducts()
    {
        return $this->hasMany('OrderProduct', 'order_id', 'id');
    }
    public function customer() 
    {
        return $this->belongsTo('Customer', 'customer_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('Product', 'order_products', 'order_id', 'product_id');
    }
}