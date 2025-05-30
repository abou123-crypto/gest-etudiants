<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'titre',
        'date',
        'type',
    ];

    // Une évaluation a plusieurs notes
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    // Une évaluation appartient à un étudiant (optionnel, si c’est le cas)
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
