<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'prenom',
        'nom',
        'date_naissance',
    ];

    // Un étudiant a plusieurs notes
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    // Un étudiant a plusieurs évaluations
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
