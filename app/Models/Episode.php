<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model {
    use HasFactory;

    protected $fillable = [
        "id","nom", "serie_id", "resume",
        "numero", "saison", "duree", "premiere",
        "urlImage",
    ];

    public $timestamps = false;

    // An episode is related to a serie
    public function serie() {
        return $this->belongsTo(Serie::class, "serie_id");
    }

    public function nbEpisodes() {
        return $this->episodes->count();
    }

    public function nbSaisons() {
        return $this->episodes()->max('saison');
    }

    public function episodes() {
        return $this->hasMany(Episode::class, "serie_id");
    }

    public function seen() {
        return $this->belongsToMany(User::class, 'seen')
            ->as('when')
            ->withPivot('date_seen');
    }

}
