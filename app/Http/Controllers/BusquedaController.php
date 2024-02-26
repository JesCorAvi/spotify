<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use Illuminate\Http\Request;
use App\Models\Cancion;


class BusquedaController extends Controller
{

    public function barra(){
        return view("busqueda.barra");
    }

    public function resultados(Request $request)
    {
        $busqueda = $request->input('input');

        $albumes = Album::where('nombre', 'ilike', '%'.$busqueda.'%')->get();
        $artistas = Artista::where('nombre', 'ilike', '%'.$busqueda.'%')->get();
        $canciones = Cancion::where('nombre', 'ilike', '%'.$busqueda.'%')->get();


        return view('busqueda.resultados', ["albumes"=>$albumes, "artistas"=>$artistas, "canciones"=>$canciones]);
    }
}
