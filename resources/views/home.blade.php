@extends('layouts.app')

@section('title', 'Beranda - Manajemen Rental Mobil')

@section('content')
    <div style="padding: 16px 0;">
        <h1 style="margin-top: 0; margin-bottom: 10px; font-size: 26px;">Manajemen Rental Mobil</h1>
        <p style="margin-top: 0; margin-bottom: 20px; color: #333333;">
            Aplikasi pencatatan armada kendaraan, tarif sewa harian, jadwal servis terakhir, dan status ketersediaan mobil rental.
        </p>
        <a href="{{ url('/cars') }}" class="btn btn-primary">Lihat Daftar Mobil</a>
    </div>
@endsection
