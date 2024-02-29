<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cancion extends Model
{
    protected $table = "canciones";
    protected $fillable = ["nombre", "duracion"];

    public function albumes(): BelongsToMany
    {
        return $this->belongsToMany(Album::class);
    }

    public function artistas(): BelongsToMany
    {
        return $this->belongsToMany(Artista::class);
    }
    use HasFactory;

    public function formatear() {
        $segundos = $this->duracion;
        $minutos = floor($segundos / 60);
        $segundosRestantes = $segundos % 60;
        if($segundosRestantes){
            return "$minutos:$segundosRestantes";

        }else{
            return "$minutos:00";
        }
    }
}
