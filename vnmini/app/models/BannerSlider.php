<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class BannerSlider extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'banner_sliders';
    protected $fillable = ['image_url', 'position'];
    protected $dates = ['deleted_at'];
}