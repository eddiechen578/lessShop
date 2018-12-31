<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    protected $fillable = [
        'name',
        'introduction',
        'category_id',
        'photo',
        'price',
        'remain_count'
    ];

    public function category(){
        return $this->belongsTo('Entities/Category','category_id','id');
    }

    public function getPhotoAttribute($photo){
        return asset($photo);
    }
}
