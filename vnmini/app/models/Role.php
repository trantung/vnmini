<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Role extends Model
{
	use SoftDeletingTrait;
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany('User', 'role_id', 'id');
    }
}