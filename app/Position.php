<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $primaryKey='id';
    protected $table='positions';
    protected $fillable=['name'];
    public $timestamps = false;
}
