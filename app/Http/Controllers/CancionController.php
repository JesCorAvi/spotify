<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artista;
use Illuminate\Http\Request;
use App\Models\Cancion;


class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("canciones.index", ["canciones"=>Cancion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("canciones.create", ["canciones" => Cancion::all(),"albumes" => Album::all(),"artistas" => Artista::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $artistas = array_keys($request->artistas);
        if($request->albumes){
            $albumes = array_keys($request->albumes);
        }else{
            $albumes = [];
        }


        if($artistas){
            $cancion = Cancion::create([
                "nombre"=> $request->nombre,
                "duracion"=> $request->duracion

            ]);

            if($albumes){
                foreach($albumes as $album){
                    $cancion->albumes()->attach($album);
                }
            }
            if($artistas){
                foreach($artistas as $artista){
                    $cancion->artistas()->attach($artista);
                }
            }

            return redirect()->route("canciones.index");
        }
        return redirect()->route("canciones.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancion $cancion)
    {
        return view("canciones.show", ["cancion"=>$cancion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancion $cancion)
    {
        return view("canciones.edit", ["cancion" => $cancion, "albumes" => Album::all(),"artistas" => Artista::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cancion $cancion)
    {
        $cancion->albumes()->detach();
        $cancion->artistas()->detach();

        $artistas = array_keys($request->artistas);
        if($request->albumes){
            $albumes = array_keys($request->albumes);
        }else{
            $albumes = [];
        }


        if($artistas){
            $cancion->update([
                "nombre"=> $request->nombre,
                "duracion"=> $request->duracion

            ]);

            if($albumes){
                foreach($albumes as $album){
                    $cancion->albumes()->attach($album);
                }
            }
            if($artistas){
                foreach($artistas as $artista){
                    $cancion->artistas()->attach($artista);
                }
            }

            return redirect()->route("canciones.index");
        }
        return redirect()->route("canciones.index");

        /*
        $artistas = array_keys($request->artistas);
        if($request->albumes){
            $albumes = array_keys($request->albumes);
        }else{
            $albumes = [];
        }

        $cancion->update([
            "nombre" => $request->nombre,
            "duracion" => $request->duracion
        ]);

        foreach ($cancion->albumes as $albumOG) {
            if (!in_array($albumOG->id, $albumes)) {
                $cancion->albumes()->detach();
            }
        }
        foreach ($albumes as $album) {
            if (!$cancion->albumes->contains("id", $album)) {
                $cancion->albumes()->attach($album);
            }
        }
        foreach ($cancion->artistas as $artistaOG) {
            if (!in_array($artistaOG->id, $artistas)) {
                $cancion->artistas()->detach();
            }
        }
        foreach ($artistas as $artista) {
            if (!$cancion->artistas->contains("id", $artista)) {
                $cancion->artistas()->attach($artista);
            }
        }

        return redirect()->route("canciones.index");
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancion $cancion)
    {
        $cancion->albumes()->detach();
        $cancion->artistas()->detach();
        Cancion::destroy([$cancion->id]);

        return redirect()->route("canciones.index");
    }

}
