<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class POSController extends Controller
{

    //
    public function index()
    {
        //    $user = UserModel::all();
        //    
        $user = UserModel::with('level')->get();
        return view('user', compact('user'));
    }
    public function create()
    {
        return view('user_tambah');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'nama' => 'required',
        ]);
        if ($validated) {
            UserModel::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => Hash::make('$request->password'),
                'level_id' => $request->level_id
            ]);
        }

        return redirect('/user')->with('succes', 'user Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $user = UserModel::findOrFail($id);
        return view('user_show', compact('user'));
    }
    public function edit($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
        ]);
        if ($validated) {
            $user = UserModel::find($id);

            $user->username = $request->username;
            $user->nama = $request->nama;
            $user->password = Hash::make('$request->password');
            $user->level_id = $request->level_id;
            $user->save();
        }

        return redirect('/user');
    }
    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }
}
