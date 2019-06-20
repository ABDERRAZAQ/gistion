<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    protected $fillable = ['id','numCIN','nomAr','prenomAr','nomFR','prenomFR','telephone','email',
    'dateNaissance','adresse', 'sexe_id','classe_id','commune_id'];
        
    public $primarykey = 'id';
        

          
    public function sexe()
    {
        return $this->belongsTo(Sexe::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
     
    public function demande(){

        return $this->belongsTo(Demande::class);
      }
   
      public function communes(){

        return $this->hasMany(Commune::class);
      }

   
}
