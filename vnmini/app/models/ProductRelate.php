<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductRelate extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'product_relates';
    protected $fillable = ['product_id', 'category_id', 'relate_code'];
    protected $dates = ['deleted_at'];

    public function product() 
    {
        return $this->belongsTo('Product', 'product_id', 'id');
    }
}