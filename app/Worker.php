<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $primaryKey='id';
    protected $table='workers';
    protected $fillable=['name','birthday','gender_id','adress','position_id','created_at','updated_at'];
}
