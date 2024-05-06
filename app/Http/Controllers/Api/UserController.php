<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function index()
    {
        return UserModel::with('level')->get();
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);
        if ($user) {
            return response()->json([
                'success' => true,
                'data' => $user,
            ], 201);
        }
        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
    public function show($user)
    {
        return UserModel::with('level')->find($user);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        UserModel::find($id)->update([
            'username' => $request->username ? $request->username : UserModel::find($id)->username,
            'nama' => $request->nama ? $request->nama : UserModel::find($id)->nama,
            'password' => $request->password ? Hash::make($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id ? $request->level_id : UserModel::find($id)->level_id,
            'image' => $request->image ? Hash::make($request->image) : UserModel::find($id)->image,
        ]);
        $user = UserModel::with('level')->find($id);
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }
        //return JSON process update failed
        return response()->json([
            'success' => false,
        ], 409);
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
