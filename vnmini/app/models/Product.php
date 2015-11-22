<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'products';
    protected $fillable = ['type_id', 'code', 'name',
    					'size', 'material', 'quantity',
    					'origin_price', 'new_price',
    					'image_url', 'description',
    					'introduce', 'information', 'status', 'name_seo', 'big_image_url'
    					];
    protected $dates = ['deleted_at'];

    public function categories() 
    {
        return $this->belongsToMany('Category', 'product_categories', 'product_id', 'category_id');

    }

    public function orderproducts()
    {
        return $this->hasMany('OrderProduct', 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('AdminImage', 'product_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany('Order', 'order_products', 'product_id', 'order_id');
    }

    public function type()
    {
        return $this->belongsTo('Type', 'type_id', 'id');
    }
    public function relates()
    {
        return $this->hasMany('ProductRelate', 'product_id', 'id');
    }

}