@extends('layouts.app')

@section('title', 'Daftar Mobil - Manajemen Rental Mobil')

@section('content')
    <div class="page-header">
        <h1>Daftar Mobil</h1>
        <a href="{{ route('cars.create') }}" class="btn btn-primary">+ Tambah Mobil</a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Plat Nomor</th>
                    <th>Tahun</th>
                    <th>Warna</th>
                    <th>Tarif Harian</th>
                    <th>Servis Terakhir</th>
                    <th>Tersedia</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $index => $car)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->plate_number }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->color ?: '-' }}</td>
                        <td>Rp {{ number_format((float) $car->daily_rate, 0, ',', '.') }}</td>
                        <td>{{ $car->last_service_at->format('Y-m-d') }}</td>
                        <td>{{ $car->is_available ? 'Ya' : 'Tidak' }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('cars.show', $car) }}" class="action-link">Detail</a>
                                <a href="{{ route('cars.edit', $car) }}" class="action-link">Ubah</a>
                                <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data mobil {{ $car->brand }} {{ $car->model }} ({{ $car->plate_number }})?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-delete-btn">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" style="text-align: center; padding: 20px; color: #555555;">
                            Belum ada data. Klik tombol "+ Tambah Mobil" di kanan atas untuk menambahkan data mobil baru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
