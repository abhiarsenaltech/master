<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $table='flyers_photos';
    protected $primaryKey='id';
    protected $fillable=['photo'];

    public function flyer(){

        return $this->belongsTo('App\Flyer');
    }

}
