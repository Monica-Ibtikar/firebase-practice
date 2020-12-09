<?php

namespace App;

class User extends BaseModel
{
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name_ar', 'name_en', 'email', 'phone',
    ];
}
