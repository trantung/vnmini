<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Customer extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'customers';
    protected $fillable = ['nickname', 'fullname', 'email',
    					'password', 'phone',
     					'address', 'city', 'note'
     					];

    public function orders()
    {
        return $this->hasMany('Order', 'customer_id', 'id');
    }
}