<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomtin extends Model
{
    public $timestamps = false;

    protected $table = "nhomtin";

    protected $primaryKey = "id_nhomtin";
    
    public function loaitin()
    {
    	return $this->hasMany('App\loaitin','id_nhomtin');
    }
    public function tin()
    {
    	return $this->hasManyThrough('App\tin','App\loaitin','id_loaitin','id_tin');
    }
}
