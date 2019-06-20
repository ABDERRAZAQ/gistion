<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    
    
    public function visiteurs(){

        return $this->hasMany(Visiteur::class);
      }
      
}
