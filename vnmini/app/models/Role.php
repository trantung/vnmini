<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Role extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'roles';
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('User', 'role_id', 'id');
    }
}