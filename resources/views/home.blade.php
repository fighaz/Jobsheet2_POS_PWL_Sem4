@extends('layout')
@section('konten')
    <h1>Selamat Datang di Aplikasi POS</h1>
    <a href="{{ url('user/1/name/SofiSugiharto Zaini') }}" class="btn btn-secondary">User Detail</a>
    <div class="row">
        <div class="col mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Food Beverage</h5>
                    <a href="{{ route('foodbeverage') }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Beauty Health</h5>
                    <a href="{{ route('beautyhealth') }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Home Care</h5>
                    <a href="{{ route('homecare') }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Baby Kid</h5>
                    <a href="{{ route('babykid') }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('penjualan') }}" class="btn btn-success">Penjualan</a>
