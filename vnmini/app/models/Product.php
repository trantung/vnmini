<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends Model
{
	use SoftDeletingTrait;
    protected $table = 'products';
    protected $fillable = ['category_id', 'code', 'name',
    					'size', 'material', 'quantity',
    					'origin_price', 'new_price',
    					'image_url', 'description',
    					'introduce', 'information', 'status'
    					];

    public function category() 
    {
        return $this->belongsTo('Category', 'category_id', 'id');
    }

    public function orderproducts()
    {
        return $this->hasMany('OrderProduct', 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('Image', 'product_id', 'id');
    }
}