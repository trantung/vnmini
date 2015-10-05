<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Sort extends Eloquent
{
	use SoftDeletingTrait;
    protected $table = 'sorts';
    protected $fillable = ['name', 'name_seo'];
    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->hasMany('Category', 'sort_id', 'id');
    }
}