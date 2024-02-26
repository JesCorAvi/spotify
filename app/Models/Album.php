<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Album extends Model
{
    protected $table = "albumes";
    protected $fillable = ["nombre", "imagen"];

    public function canciones(): BelongsToMany
    {
        return $this->belongsToMany(Cancion::class);
    }

    public function tiempo(){
        $segundos = 0;
        foreach($this->canciones as $cancion){
            $segundos += $cancion->duracion;
        }
        $minutos = floor($segundos / 60);
        $segundosRestantes = $segundos % 60;
        if (!$segundos){
            return "Sin canciones";

        }
        $minutos = floor($segundos / 60);
        $segundosRestantes = $segundos % 60;
        if($segundosRestantes){
            return "$minutos:$segundosRestantes";

        }else{
            return "$minutos:00";
        }
    }
    use HasFactory;
}
