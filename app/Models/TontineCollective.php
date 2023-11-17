<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TontineCollective extends Model
{
    use HasFactory;
    public function agents(){
        return $this->belongsTo(Agent::class, 'agent');
    }

    public function membres(){
        return $this->belongsToMany(Membre::class)->withPivot('montantPayementC', 'datePayementC', 'codePayementC', 'membre', 'tontine');
    }

    public function participations(){
        return $this->hasMany(Participation::class);
    }
}
