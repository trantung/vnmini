<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Image extends Model
{
	use SoftDeletingTrait;
    protected $table = 'images';
    protected $fillable = ['product_id', 'image_url', 'status'];

    public function product() 
    {
        return $this->belongsTo('Product', 'product_id', 'id');
    }
}