<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;

class KategoriController extends Controller
{
    //
    public function index(KategoriDataTable $dataTable)
    {
        $breadcrumb = (object) [
            'title' => 'Daftar kategori',
            'list' => ['Home', 'Kategori'],
        ];
        $page = (object) [
            'title' => 'Daftar kategori yang terdaftar dalam sistem',
        ];
        $activeMenu = 'kategori';
        return $dataTable->render('kategori.index', compact('breadcrumb', 'page', 'activeMenu'));
    }
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar kategori',
            'list' => ['Home', 'Kategori'],
        ];
        $page = (object) [
            'title' => 'Daftar kategori yang terdaftar dalam sistem',
        ];
        $activeMenu = 'kategori';
        return view('kategori.create', compact('breadcrumb', 'page', 'activeMenu'));
    }
    // public function store(Request $request){
    //     $validated = $request->validate([
    //         'kategori_kode' => 'bail|required|max:5',
    //         'kategori_nama' => 'required',
    //     ]);
    //     if($validated){
    //         KategoriModel::create([
    //             'kategori_kode' => $request->kodeKategori,
    //             'kategori_nama' => $request->namaKategori,
    //         ]);
    //     }

    //     return redirect('/kategori');
    // }
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

        if ($validated) {
            KategoriModel::create([
                'kategori_kode' => $request->kodeKategori,
                'kategori_nama' => $request->namaKategori,
            ]);
        }
        return redirect('/kategori');
    }
    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Daftar kategori',
            'list' => ['Home', 'Kategori'],
        ];
        $page = (object) [
            'title' => 'Daftar kategori yang terdaftar dalam sistem',
        ];
        $activeMenu = 'kategori';
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'page' => $page, 'data' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $kategori = KategoriModel::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();

        return redirect('/kategori');
    }
    public function delete($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
