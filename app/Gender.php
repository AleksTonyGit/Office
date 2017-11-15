<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $primaryKey='id';
    protected $table='genders';
    protected $fillable=['name'];
    public $timestamps = false;
}
