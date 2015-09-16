<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class BannerImage extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'banner_images';
    protected $fillable = ['image_url'];
    protected $dates = ['deleted_at'];
}