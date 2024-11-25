<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index(Request $request)
    {
        $userroles = UserRole::all();
        return view('userrole.index', compact('userroles'));
    }

    public function create(Request $request)
    {
        $users = User::all();
        $roles = Role::all();
        return view('userrole.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $userroles = UserRole::create([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
        ]);
        return redirect()
            ->route('admin.userrole.index')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function edit($id)
    {
        $users= User::all();
        $roles = Role::all();
        $ganti = UserRole::find($id);
        return view('userrole.edit', compact('ganti', 'users', 'roles'));
    }

    public function update($id, Request $request)
    {
        $ganti = UserRole::find($id);
        $ganti->user_id = $request->user_id;
        $ganti->role_id = $request->role_id;
        $ganti->save();
        return redirect()
            ->route('admin.userrole.index')
            ->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $ganti = UserRole::find($id);
        $ganti->delete();
        return redirect()
            ->route('admin.userrole.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
