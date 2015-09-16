<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Comment extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'comments';
    protected $fillable = ['product_id', 'content', 'status'];
    protected $dates = ['deleted_at'];

    public function product() 
    {
        return $this->belongsTo('Product', 'product_id', 'id');
    }
}