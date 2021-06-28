<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserEloquent;
use Illuminate\Support\Facades\Redirect;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = UserEloquent::all();
        return view('users.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ejecutar validaciones de la petición
        $validateData = $request->validate([
            'name' => 'required|min:3|max:10',
            'password' => 'required|min:5|max:10',
            'email' => 'required|email'
        ]);

        //  Redireccionar con un mensaje especial
        if ($request->name == 'jose') {
            return Redirect()->route('users.create')->withErrors(
                ["Nombre" => "No se puede registrar un jose"]
            );
        }

        // $mUser = new UserEloquent();
        // $mUser->name = $request->name;
        // $mUser->email = $request->email;
        // $mUser->password = bcrypt($request->password);
        // $mUser->save();

        // $mUser = new UserEloquent($request->all());
        // $mUser->password = bcrypt($mUser->password);
        // $mUser->save();

        $mUser = new UserEloquent();
        $mUser->fill($request->all());
        $mUser->password = bcrypt($mUser->password);
        $mUser->save();

        // Mensaje Flash (una vez se usa, se elimina la variable)
        Session::flash('message', '¡Usuario creado!');
        return Redirect::to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = UserEloquent::find($id);
        return view('users.show', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = UserEloquent::find($id);
        return view('users.edit', compact('modelo'));
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
        // Ejecutar validaciones de la petición
        $validateData = $request->validate([
            'name' => 'required|min:3|max:10',
            'email' => 'required|email'
        ]);

        $mUser = UserEloquent::find($id);
        $mUser->name = $request->name;
        $mUser->email = $request->email;
        if ($request->password) {
            $mUser->password = bcrypt($request->password);
        }
        $mUser->save();

        // Mensaje Flash (una vez se usa, se elimina la variable)
        Session::flash('message', '¡Usuario actualizado!');
        return Redirect::to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelo = UserEloquent::find($id);
        $modelo->delete();

        // Mensaje Flash (una vez se usa, se elimina la variable)
        Session::flash('message', '¡Usuario eliminado!');
        return Redirect::to('users');
    }
}
