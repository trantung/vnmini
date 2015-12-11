<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Footer extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'footers';
    protected $fillable = ['contact', 'address', 'hotline', 'email'];
    protected $dates = ['deleted_at'];
    
}