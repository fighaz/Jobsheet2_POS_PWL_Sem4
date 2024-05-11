<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function fileUpload()
    {
        return view('file-upload');
    }
    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:5000'
        ]);
        $extfile = $request->berkas->getClientOriginalName();
        $namaFile = $request->nama . "." . $request->berkas->extension();

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);
        $pathBaru = asset('gambar/' . $namaFile);

        return view('file-upload-rename', compact('pathBaru', 'namaFile'));
    }
}
