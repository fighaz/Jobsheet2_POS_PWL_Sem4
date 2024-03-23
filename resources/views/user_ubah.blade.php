@extends('layouts.app')
@section('content')
    <h1>Form Ubah Data User</h1>
    <a href="/user">Kembali</a>
    <br><br>

    <form action="/user/ubah_simpan/{{ $data->user_id }}" method="post">
        @csrf
        {{ method_field('PUT') }}

        <label for="username">Username</label>
        <input type="text" name="username" id="" placeholder="Masukkan Username" value="{{ $data->username }}">
        <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="" placeholder="Masukkan Nama" value="{{ $data->nama }}">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="" placeholder="Masukkan Password" value="{{ $data->password }}">
        <br>
        <label for="level_id">Level ID</label>
        <input type="number" name="level_id" id="" placeholder="Masukkan ID Level" value="{{ $data->level_id }}">
        <br><br>
        <input type="submit" value="Ubah" class="btn btn-success">
    </form>
@endsection
