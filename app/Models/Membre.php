<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;
    public function totinesC(){
        return $this->belongsToMany(TontineCollective::class);
    }

    public function tontinesI(){
        return $this->hasMany(TontineIndividuelle::class);
    }

    public function cotisations(){
        return $this->hasMany(Cotisation::class);
    }
}
