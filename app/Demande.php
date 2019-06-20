<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{

    protected $fillable = ['id','numOrdre','objet','dateVisite','heurEntree','heurSortie','theme_id','statu_id',
    'type_id','division_id', 'service_id','commune_id','sExt_id','remarque', 'serviceSuppl','commandement_id','nbrVisiteur'];


    public function visiteurs()
    {
        return $this->hasMany(Visiteur::class);
    }
}
