<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexe extends Model
{
    
    

    public function visiteurs(){

        return $this->hasMany(Visiteur::class);
      }
}
