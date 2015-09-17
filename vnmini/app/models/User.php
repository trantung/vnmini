<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $fillable = ['role_id', 'name', 'email',
					'password', 'phone', 'status'
					];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function role() 
    {
        return $this->belongsTo('Role', 'role_id', 'id');
    }

    public function shops()
    {
        return $this->hasMany('Shop', 'user_id', 'id');
    }

    public function news()
    {
        return $this->hasMany('New', 'user_id', 'id');
    }
}
