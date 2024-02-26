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

        if($request->artista ){
            $cancion = Cancion::create([
                "nombre"=> $request->nombre,
                "duracion"=> $request->duracion

            ]);
            $cancion->albumes()->attach($request->album);
            $cancion->artistas()->attach($request->artista);
            return redirect()->route("canciones.index");
        }
        return redirect()->route("canciones.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancion $cancion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancion $cancion)
    {
        return view("canciones.edit", ["cancion" => $cancion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cancion $cancion)
    {
        $cancion->update([
            "nombre" => $request->nombre,
            "duracion" => $request->duracion
        ]);
        return redirect()->route("canciones.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancion $cancion)
    {
        Cancion::destroy([$cancion->id]);
        return redirect()->route("canciones.index");
    }
    public function añadirArtista(Cancion $cancion)
    {
        return view("canciones.añadirArtista", ["cancion"=>$cancion, "artistas" => Artista::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function guardarArtista(Request $request, Cancion $cancion)
    {
        $cancion->artistas()->attach($request->artista);

        return redirect()->route("canciones.index");
    }

    public function añadirAlbum(Cancion $cancion)
    {
        return view("canciones.añadirAlbum", ["cancion"=>$cancion, "albumes" => Album::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function guardarAlbum(Request $request, Cancion $cancion)
    {
        $cancion->albumes()->attach($request->album);

        return redirect()->route("canciones.index");

    }
}
