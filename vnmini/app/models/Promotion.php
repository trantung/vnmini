<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Promotion extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'promotions';
    protected $fillable = ['title', 'description'];
    protected $dates = ['deleted_at'];
}