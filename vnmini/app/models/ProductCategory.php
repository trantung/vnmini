<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductCategory extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'product_categories';
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo('Product', 'product_id', 'id');
    }

    public function category() 
    {
        return $this->belongsTo('Category', 'category_id', 'id');
    }
}