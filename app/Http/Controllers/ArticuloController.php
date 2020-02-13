<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articulos=Articulo::orderby('id')
        ->categoria($request->categoria)
        ->precio($request->precio)
        ->paginate(3);
        $categorias = ['Bazar','Hogar','Electronica'];
        $precio = ['1','2','3','4'];
        return view('articulos.index',compact('articulos','categorias','request','precio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = ['Bazar','Hogar','Electronica'];
        return view('articulos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Comprobamos que se ha mandado la foto
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            //Nombre de la foto
            $file=$request->file('foto');
            //le asignamos la ruta
            $nombre='articulos/'.time().'_'.$file->getClientOriginalName();
            //Lo guardamos en public
            Storage::disk('public')->put($nombre, \File::get($file));
            //Una vez guardado creamos el nuevo articulo
            $articulo=Articulo::create($request->all());
            $articulo->update(['imagen'=>"img/$nombre"]);
        }else{
            Articulo::create($request->all());
        }
        return redirect()->route('articulos.index')->with('mensaje','Articulo creado Correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.show',compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $categorias = ['Bazar','Hogar','Electronica'];
        return view('articulos.edit',compact('articulo','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        if($request->has('foto')){
            $request->validate([
                'foto'=>'image'
            ]);

            $file=$request->file('foto');
            $nombre='articulos/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            $articulo->update($request->all());
            $articulo->update(['imagen'=>"img/$nombre"]);
        }else{
            $articulo->update($request->all());
        }
        return redirect()->route('articulos.index')->with('mensaje','Articulo editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $foto=$articulo->imagen;
        //La foto no es default.jpg por lo que la borramos
        if(basename($foto)!="default.jpg"){
            unlink($foto);
        }
        $articulo->delete();
        return redirect()->route('articulos.index')->with('mensaje','Articulo borrado Correctamente');
    }
}
