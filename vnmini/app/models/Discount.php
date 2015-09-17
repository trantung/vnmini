<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Discount extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'discounts';
    protected $fillable = ['percentage'];
    protected $dates = ['deleted_at'];
}