<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function index()
    {
        return BarangModel::with('kategori')->get();
    }
    public function store(Request $request)
    {
        $barang = BarangModel::create($request->all());
        return response()->json($barang, 201);
    }
    public function show($barang)
    {
        return BarangModel::with('kategori')->find($barang);
    }
    public function update(Request $request, $barang)
    {
        BarangModel::find($barang)->update($request->all());
        return BarangModel::with('kategori')->find($barang);
    }
    public function destroy($barang)
    {
        BarangModel::destroy($barang);

        return response()->json([
            'success' => true,
            'message' => 'Data Terhapus'
        ]);
    }
}
