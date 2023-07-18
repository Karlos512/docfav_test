<?php

namespace App\Http\Controllers;

use App\Models\DatosUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UsuarioController extends Controller
{
    public function index()
    {
        return view('index', ['view' => 'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardarUsuario(Request $request)
    {
        $nuevo_usuario = Usuario::create([
            'name' => $request->get('nombre'),
            'email' => $request->get('correo'),
            'password' => Hash::make($request->get('pass'))
        ]);
        $nuevo_usuario->push();

        $data = $request;
        self::guardarDatosUsuario($data, $nuevo_usuario);

        return $nuevo_usuario;
    }

    public function guardarDatosUsuario($request, $nuevo_usuario)
    {
        $id_usuario = $nuevo_usuario->id;

        $datos_usuario = DatosUsuario::create([
            'id_usuario' => $id_usuario,
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'fecha_nac' => $request->get('fecha')
        ]);

        $datos_usuario->push();

        return $datos_usuario;
    }

    public function listarusuarios()
    {
        // $usuarios = Usuario::get();
        $usuarios = Usuario::join('datosusuario', 'usuarios.id', '=', 'datosusuario.id_usuario')
            ->get(['usuarios.*', 'datosusuario.*']);

        return view('registrados', ['view' => 'registrados'])->with(compact('usuarios'));
    }

    public function EliminarUsuario($id)
    {
        $usuario = Usuario::where(['id' => $id]);
        $usuario->delete();
        $datos = DatosUsuario::where(['id_usuario' => $id]);
        $datos->delete();

        return redirect()->back()->withInput();
    }


    public function editarusuario($id)
    {
        $usuario = Usuario::join('datosusuario', 'usuarios.id', '=', 'datosusuario.id_usuario')
            ->get(['usuarios.*', 'datosusuario.*'])->where('id', $id);
        // $usuario = User::where('id', $id)->first();
        return view('editarusuario', ['view' => 'editarusuario'])->with(compact('usuario'));
    }

    public function guardarCambios(Request $request)
    {
        $usuario = Usuario::find($request->get('id'));
        $usuario->id = $request->get('id');
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = Hash::make($request->get('pass'));

        $usuario->update();

        $datos = DatosUsuario::find()->where('id_usuairo', $request->get('id'));
        $datos->direccion = $request->get('name');
        $datos->telefono = $request->get('email');
        $datos->fecha_nac = $request->get('pass');

        $datos->update();


        return $usuario;
    }
}
