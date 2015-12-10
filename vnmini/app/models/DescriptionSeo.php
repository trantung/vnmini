<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class DescriptionSeo extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'description_seos';
    protected $fillable = ['description'];
    protected $dates = ['deleted_at'];
    
}