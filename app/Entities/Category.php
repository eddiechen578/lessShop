<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function merchandises(){
        return $this->hasMany('Entities/Merchandise','category_id','id');
    }
}
