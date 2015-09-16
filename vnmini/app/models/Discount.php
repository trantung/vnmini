<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Discount extends Model
{
	use SoftDeletingTrait;
    protected $table = 'discounts';
    protected $fillable = ['percentage'];
}