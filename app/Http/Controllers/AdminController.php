<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->orderBy('name', 'asc')->paginate(5);
        $fasilitas = DB::table('fasilitas')->paginate(5);
        return view('admin.index')->with(['users' => $users,
        'fasilitas' => $fasilitas]);
    }

    public function updateRole($id)
    {
        $user = User::find($id);
        switch ($user->role) {
            case 'admin':
                $user->role = 'user';
                break;

            case 'user':
                $user->role = 'admin';
                break;
            
            default:
                $user->role = 'user';
                break;
        }
        $user->save();
        return redirect('/admin')->with('success', 'Akses berhasil diubah');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.editUser')->with('user', $user);
    }

    public function updateUser(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|min:6|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|max:255|min:8|confirmed',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if(null !== $request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect('/admin')->with('success', 'Data user berhasil dirubah');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin')->with('success', 'Data user berhasil dihapus');
    }
}
