<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TontineIndividuelle extends Model
{
    use HasFactory;

    public function membres(){
        return $this->belongsTo(Membre::class,"membre");
    }

    public function agents(){
        return $this->belongsTo(Agent::class,"agent");
    }

    public function cotisations(){
        return $this->hasMany(Cotisation::class);
    }
}
