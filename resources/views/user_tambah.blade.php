@extends('layout')
@section('konten')
    <h1>Form Tambah Data User</h1>
    <form action="/user/tambah_simpan" method="post">
        @csrf
        <label for="username">Username</label>
        <input type="text" name="username" id="" placeholder="Masukkan Username">
        <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="" placeholder="Masukkan Nama">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="" placeholder="Masukkan Password">
        <br>
        <label for="level_id">Level ID</label>
        <input type="number" name="level_id" id="" placeholder="Masukkan ID Level">
        <br><br>
        <input type="submit" value="Simpan" class="btn btn-success">
    </form>
@endsection
