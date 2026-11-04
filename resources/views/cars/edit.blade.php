@extends('layouts.app')

@section('title', 'Ubah Mobil - Manajemen Rental Mobil')

@section('content')
    <div class="page-header">
        <h1>Ubah Mobil</h1>
    </div>

    <form action="{{ route('cars.update', $car) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="form-row">
            <label for="brand">Merk</label>
            <div>
                <select id="brand" name="brand" class="form-control @error('brand') is-invalid @enderror">
                    <option value="">-- Pilih merk --</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand }}" {{ old('brand', $car->brand) === $brand ? 'selected' : '' }}>
                            {{ $brand }}
                        </option>
                    @endforeach
                </select>
                @error('brand')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <label for="model">Model</label>
            <div>
                <input type="text" id="model" name="model" value="{{ old('model', $car->model) }}" placeholder="Contoh: Avanza" class="form-control @error('model') is-invalid @enderror">
                @error('model')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <label for="plate_number">Plat Nomor</label>
            <div>
                <input type="text" id="plate_number" name="plate_number" value="{{ old('plate_number', $car->plate_number) }}" placeholder="Contoh: B 1234 KJA" class="form-control @error('plate_number') is-invalid @enderror">
                @error('plate_number')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <label for="year">Tahun</label>
            <div>
                <input type="number" id="year" name="year" value="{{ old('year', $car->year) }}" placeholder="Contoh: 2021" class="form-control @error('year') is-invalid @enderror">
                @error('year')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <label for="daily_rate">Tarif Harian (Rp)</label>
            <div>
                <input type="number" step="0.01" id="daily_rate" name="daily_rate" value="{{ old('daily_rate', (float) $car->daily_rate) }}" placeholder="Contoh: 350000" class="form-control @error('daily_rate') is-invalid @enderror">
                @error('daily_rate')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <label for="last_service_at">Servis Terakhir</label>
            <div>
                <input type="date" id="last_service_at" name="last_service_at" value="{{ old('last_service_at', $car->last_service_at->format('Y-m-d')) }}" class="form-control @error('last_service_at') is-invalid @enderror">
                @error('last_service_at')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <label for="is_available">Status Tersedia</label>
            <div>
                <label class="checkbox-label">
                    <input type="checkbox" id="is_available" name="is_available" value="1" {{ old('is_available', $car->is_available) ? 'checked' : '' }}>
                    <span>Ya, mobil tersedia untuk disewa</span>
                </label>
                @error('is_available')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <label for="notes">Catatan</label>
            <div>
                <textarea id="notes" name="notes" rows="3" placeholder="Tulis catatan singkat (opsional)" class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $car->notes) }}</textarea>
                @error('notes')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('cars.index') }}" class="btn">Batal</a>
        </div>
    </form>
@endsection
