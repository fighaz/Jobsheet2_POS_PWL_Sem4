<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Yajra\Datatables\Datatables;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User'],
        ];
        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem',
        ];
        $activeMenu = 'user';
        $user = UserModel::with('level')->get();
        $level = LevelModel::all();
        return view('user.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'data' => $user, 'page' => $page, 'level' => $level]);
    }
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');
        // Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }
        return DataTables::of($users)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) {
                // menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/edit/' . $user->user_id) . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() .
                    method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah'],
        ];
        $page = (object) [
            'title' => 'Tambah User baru',
        ];
        $level = LevelModel::all();
        $activeMenu = 'user';
        return view('user.tambah', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'level' => $level, 'page' => $page]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer'
        ]);
        if ($validated) {
            UserModel::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => Hash::make($request->password),
                'level_id' => $request->level_id,
            ]);
        }

        return redirect('/user')->with('success', 'user Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();
        $breadcrumb = (object) [
            'title' => 'Ubah User',
            'list' => ['Home', 'User', 'Ubah'],
        ];
        $page = (object) [
            'title' => 'Ubah User ',
        ];
        $activeMenu = 'user';

        return view('user.ubah', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'user' => $user, 'level' => $level, 'page' => $page]);
    }
    public function update($id, Request $request)
    {

        $validated = $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
        ]);
        if ($validated) {
            UserModel::find($id)->update([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => $request->password ? Hash::make($request->password) : UserModel::find($id)->password,
                'level_id' => $request->level_id,
            ]);
        }
        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }
    public function show($id)
    {
        $user = UserModel::with('level')->find($id);
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail'],
        ];
        $page = (object) [
            'title' => 'Detail User',
        ];
        $activeMenu = 'user';
        return view('user.show', compact('user', 'breadcrumb', 'page', 'activeMenu'));
    }
    public function delete($id)
    {
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }
        try {
            UserModel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat table lain yang terkait dengan data ini');
        }
    }
}
