<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'categories';
    protected $fillable = ['name', 'status', 'sort_id'];
    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->belongsToMany('Product', 'order_products', 'category_id', 'product_id');
    }
    public function sort() 
    {
        return $this->belongsTo('Sort', 'sort_id', 'id');
    }
}