@extends('layouts.app')

@section('title', 'Detail Mobil - Manajemen Rental Mobil')

@section('content')
    <div class="page-header">
        <h1>Detail Mobil</h1>
    </div>

    <div class="detail-list">
        <div class="detail-row">
            <div class="detail-label">Merk</div>
            <div class="detail-value">{{ $car->brand }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Model</div>
            <div class="detail-value">{{ $car->model }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Plat Nomor</div>
            <div class="detail-value">{{ $car->plate_number }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Tahun</div>
            <div class="detail-value">{{ $car->year }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Tarif Harian</div>
            <div class="detail-value">Rp {{ number_format((float) $car->daily_rate, 0, ',', '.') }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Servis Terakhir</div>
            <div class="detail-value">{{ $car->last_service_at->format('Y-m-d') }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Tersedia</div>
            <div class="detail-value">{{ $car->is_available ? 'Ya' : 'Tidak' }}</div>
        </div>
        <div class="detail-row">
            <div class="detail-label">Catatan</div>
            <div class="detail-value">{{ $car->notes ?: '(kosong)' }}</div>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('cars.edit', $car) }}" class="btn btn-primary">Ubah</a>
        <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data mobil {{ $car->brand }} {{ $car->model }} ({{ $car->plate_number }})?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        <a href="{{ route('cars.index') }}" class="btn">Kembali</a>
    </div>
@endsection
