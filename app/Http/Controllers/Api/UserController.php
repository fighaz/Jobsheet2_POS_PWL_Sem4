<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return UserModel::with('level')->get();
    }
    public function store(Request $request)
    {
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);
        return response()->json($user, 201);
    }
    public function show($user)
    {
        return UserModel::with('level')->find($user);
    }
    public function update(Request $request, $id)
    {
        UserModel::find($id)->update([
            'username' => $request->username ? $request->username : UserModel::find($id)->username,
            'nama' => $request->nama ? $request->nama : UserModel::find($id)->nama,
            'password' => $request->password ? Hash::make($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id ? $request->level_id : UserModel::find($id)->level_id,
        ]);
        return UserModel::with('level')->find($id);
    }
    public function destroy($user)
    {
        UserModel::destroy($user);
        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus'
        ]);
    }
}
