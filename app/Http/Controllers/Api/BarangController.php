<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    //
    public function index()
    {
        return BarangModel::with('kategori')->get();
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $barang = BarangModel::create($request->all());
        if ($barang) {
            return response()->json([
                'success' => true,
                'data' => $barang,
            ], 201);
        }
        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
    public function show($barang)
    {
        return BarangModel::with('kategori')->find($barang);
    }
    public function update(Request $request, $barang)
    {
        $validator = Validator::make($request->all(), [
            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //if validations fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        BarangModel::find($barang)->update($request->all(), [
            $request->image->hashName()
        ]);
        $barang = BarangModel::with('kategori')->find($barang);
        if ($barang) {
            return response()->json([
                'success' => true,
                'data' => $barang,
            ], 201);
        }
        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
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
