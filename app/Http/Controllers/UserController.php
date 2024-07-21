<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuarios.index', [
            'usuarios' => User::orderBy('name')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole($request->rol);

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('usuarios.edit', [
            'usuario' => User::find($id),
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());


        if ($request->password == null) {
            $user = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        } else {
            $user = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        }

        $user = User::find($id);
        $user->assignRole($request->rol);
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::destroy($id);

        return redirect()->route('usuarios.index');
    }
}
