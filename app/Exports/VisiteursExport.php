<?php

namespace App\Exports;
use App\Visiteur;

use Maatwebsite\Excel\Concerns\FromCollection;

class VisiteursExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Visiteur::all();
    }
}
