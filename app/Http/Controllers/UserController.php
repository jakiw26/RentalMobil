<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = Users::all();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ]);

        return redirect('/admin/users');
    }

    public function update(Request $request, $id)
    {
       
        $user = Users::find($id);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role
        ]);

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();
        return redirect('/admin/users');
    }
}
