<?php

namespace App\Livewire;

use App\Models\Cancion;
use Livewire\Component;

class Crear extends Component
{
    public $canciones;
    public $albumes;
    public $artistas;
    public $nombreA;
    public $duracionA;
    public $artistasA = [];
    public $albumesA = [];

    public function crear()
    {
        $this->artistasA = array_keys($this->artistasA);
        if ($this->albumesA) {
            $this->albumesA = array_keys($this->albumesA);
        } else {
            $this->albumesA = [];
        }


        if ($this->artistasA) {
            $cancion = Cancion::create([
                "nombre" => $this->nombreA,
                "duracion" => $this->duracionA

            ]);

            if ($this->albumesA) {
                foreach ($this->albumesA as $album) {
                    $cancion->albumes()->attach($album);
                }
            }
            if ($this->artistasA) {
                foreach ($this->artistasA as $artista) {
                    $cancion->artistas()->attach($artista);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.crear');
    }

}
