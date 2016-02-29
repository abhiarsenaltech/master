<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{

    protected $fillable=[
        'street',
        'city',
        'price',
        'zip',
        'country',
        'state',
        'description'

    ];

   public function scopeLocatedAt($query,$zip,$street)
   {
       $street=str_replace('-',' ',$street);
       return $query->where(compact('zip','street'));
   }


    public function photos()
   {
       return $this->hasMany('App\Photo','flyer_id','id');
   }

    public function path()
    {
        return $this->zip.'/'.str_replace(' ','-',$this->street);

    }

    public function owner(){
        return $this->belongsTo('App\User','user_id');
    }
    public function ownedBy(User $user){
        return $this->user_id==$user->id;

    }
}
