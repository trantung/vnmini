<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AdminNew extends Model
{
	use SoftDeletingTrait;
    protected $table = 'news';
    protected $fillable = ['user_id', 'title', 'description', 'image_url'];

    public function user() 
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }
}