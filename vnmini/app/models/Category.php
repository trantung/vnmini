<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'categories';
    protected $fillable = ['name', 'status', 'parent_id'];
    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->belongsToMany('Product', 'product_categories', 'category_id', 'product_id');
    }
    public function sort() 
    {
        return $this->belongsTo('Category', 'parent_id', 'id');
    }
    public function categories()
    {
        return $this->hasMany('Category', 'parent_id', 'id');
    }

    public function product_categories(){
        return $this->hasMany('ProductCategory', 'category_id', 'id');
    }

}