<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'weight',
        'price',
        'category_id',
        'image_1',
        'image_2',
        'image_3',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
