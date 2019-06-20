<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }
}
