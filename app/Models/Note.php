<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'etudiant_id',
        'evaluation_id',
        'valeur',  // par exemple la note
    ];

    // Une note appartient à un étudiant
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    // Une note appartient à une évaluation
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
