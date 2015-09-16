<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrderProduct extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'order_products';
    protected $fillable = ['product_id', 'order_id', 'product_quantity'];
    protected $dates = ['deleted_at'];

    public function product() 
    {
        return $this->belongsTo('Product', 'product_id', 'id');
    }

    public function customer() 
    {
        return $this->belongsTo('Customer', 'customer_id', 'id');
    }

    public function order() 
    {
        return $this->belongsTo('Order', 'order_id', 'id');
    }
}