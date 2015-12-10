<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Type extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'types';
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany('Product', 'type_id', 'id');
    }
}