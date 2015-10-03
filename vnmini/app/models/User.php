<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    protected $fillable = ['role_id', 'name', 'email',
					'password', 'phone', 'status'
					];
    protected $dates = ['deleted_at'];

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
    
	public function isAdmin(){
		if($this->role_id == 1){
			return true;
		}
		else{
			return false;
		}
	}
}
