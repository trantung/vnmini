<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Shop extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'shops';
    protected $fillable = ['user_id', 'name', 'description',
    					'address', 'contact', 'tel', 'mobile',
    					'image_url', 'lat', 'long', 'logo', 'ordermessage'
    					];
    protected $dates = ['deleted_at'];

    public function user() 
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
}