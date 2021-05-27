<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class Productos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        return view('home', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $categoria
     * @return \Illuminate\Http\Response
     */
    public function showProductosCategoria($categoria_id)
    {
        return view('productosCategoria', ['categoria_id'=>$categoria_id, 
        'productos'=>Producto::where('categoria_id',$categoria_id)->get(),
        'nombreCategoria'=>Categoria::findOrFail($categoria_id)]);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $categoria
     * @return \Illuminate\Http\Response
     */
    public function showProducto($producto_id)
    {
        $producto = Producto::findOrFail($producto_id);
        $descuento = ($producto->descuento * $producto->precio)/100;
        $precioFinal = $producto->precio - $descuento;
        
        return view('producto', [
        'producto_id'=>$producto_id,
        'producto'=>$producto,
        'precioFinal'=>$precioFinal, 
        'categorias'=>Categoria::get()]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
