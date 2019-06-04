<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

abstract class HasUsers extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
