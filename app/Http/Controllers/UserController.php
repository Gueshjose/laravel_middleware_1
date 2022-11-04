<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['RoleVerification:1,2']);
    }



    public function index()
    {
        $users = User::all();
        return view('pages.back.users', compact('users'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('pages.back.editUser', compact('user', "roles"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => 'required',
        ]);

        $update = User::find($id);

        $update->name = $request->name;
        $update->email = $request->email;
        $update->role_id = $request->role_id;

        $update->save();

        return redirect(route('users'));
    }

    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect(route('users'));
    }
}
