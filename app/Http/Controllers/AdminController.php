<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\User;
use App\Fasilitas;
use Auth;

class AdminController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            if ($this->user->role == "user") {
                abort(404);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $users = DB::table('users')->orderBy('role', 'asc')->orderBy('name', 'asc')->paginate(5, ['*'], 'users');
        $fasilitas = DB::table('fasilitas')->paginate(5, ['*'], 'fasilitas');
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
        $request->validate([
            'name' => 'required|string|min:6|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|max:255|min:7|confirmed',
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

    public function createFasilitas()
    {
        return view('admin.createFasilitas');
    }

    public function storeFasilitas(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'icon' => 'required|image|max:10'
        ]);

        if($request->hasFile('icon')){
            $fileNameWithExt = $request->file('icon')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('icon')->storeAs('public/image/icon', $fileNameToStore);
        }

        $fasilitas = new Fasilitas;
        $fasilitas->nama_fasilitas = $request->input('name');
        $fasilitas->icon = $fileNameToStore;
        $fasilitas->save();

        return redirect('/admin')->with('success', 'Fasilitas Berhasil disimpan');
    }

    public function deleteFasilitas($id)
    {
        $fasilitas = Fasilitas::find($id);
        Storage::delete('public/image/icon/'.$fasilitas->icon);
        $fasilitas->delete();
        return redirect('/admin')->with('success', 'Data fasilitas berhasil dihapus');
    }
}
