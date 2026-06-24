<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view(
            'admin.usuarios.index',
            compact('usuarios')
        );
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')
                            ->store('usuarios', 'public');
        }

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
            'foto' => $foto,

        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente');
    }

    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);

        return view(
            'admin.usuarios.edit',
            compact('usuario')
        );
    }

    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;

        if (!empty($request->password)) {

            $usuario->password =
                Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {

            if ($usuario->foto) {

                Storage::disk('public')
                    ->delete($usuario->foto);
            }

            $ruta = $request->file('foto')
                            ->store('usuarios', 'public');

            $usuario->foto = $ruta;
        }

        $usuario->save();

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario actualizado');
    }

    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->foto) {

            Storage::disk('public')
                ->delete($usuario->foto);
        }

        $usuario->delete();

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario eliminado');
    }

    public function show(string $id)
    {
    }
}