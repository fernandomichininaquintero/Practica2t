<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editView()
    {
        $user_id = Auth::id();
        $usuario = User::findOrFail($user_id);
        return view('modify', compact('usuario')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user_id = Auth::id();
        $usuario = User::findOrFail($user_id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nombre'=> 'required|string|max:45',
            'apellidos'=> 'required|string|max:80',
            'dni'=> 'required|string|min:9|max:9',
            'direccion'=> 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('modificar-usuario')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $usuario->name = $request->input('name');
            $usuario->nombre = $request->input('nombre');
            $usuario->apellidos = $request->input('apellidos');
            $usuario->dni = $request->input('dni');
            $usuario->direccion = $request->input('direccion');

            $usuario->save();
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user_id = Auth::id();

        if ($request->has('user_id')) {
            $usuario = User::findOrFail($user_id);

            $usuario->delete();

            return redirect('/');
        }

        return view('confirm_delete', compact('user_id'));
    }
}
