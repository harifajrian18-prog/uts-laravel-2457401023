<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(): View
    {
        $cars = Car::orderBy('id')->get();

        return view('cars.index', compact('cars'));
    }

    public function create(): View
    {
        $brands = Car::BRANDS;

        return view('cars.create', compact('brands'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateCar($request);

        Car::create($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Data mobil berhasil ditambahkan.');
    }

    public function show(Car $car): View
    {
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car): View
    {
        $brands = Car::BRANDS;

        return view('cars.edit', compact('car', 'brands'));
    }

    public function update(Request $request, Car $car): RedirectResponse
    {
        $validated = $this->validateCar($request);

        $car->update($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Data mobil berhasil diubah.');
    }

    public function destroy(Car $car): RedirectResponse
    {
        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Data mobil berhasil dihapus.');
    }

    protected function validateCar(Request $request): array
    {
        $validated = $request->validate([
            'brand' => ['required', 'string', Rule::in(Car::BRANDS)],
            'model' => ['required', 'string', 'max:255'],
            'plate_number' => ['required', 'string', 'max:50'],
            'year' => ['required', 'integer', 'min:1990', 'max:2035'],
            'color' => ['nullable', 'string', 'max:100'],
            'daily_rate' => ['required', 'numeric', 'min:0'],
            'last_service_at' => ['required', 'date'],
            'is_available' => ['nullable', 'boolean'],
            'notes' => ['nullable', 'string'],
        ], [
            'brand.required' => 'Merk wajib dipilih.',
            'brand.in' => 'Merk harus salah satu dari Toyota, Honda, atau Hyundai.',
            'model.required' => 'Model mobil wajib diisi.',
            'plate_number.required' => 'Nomor plat wajib diisi.',
            'year.required' => 'Tahun wajib diisi.',
            'year.integer' => 'Tahun harus berupa angka bulat.',
            'daily_rate.required' => 'Tarif harian wajib diisi.',
            'daily_rate.numeric' => 'Tarif harian harus berupa angka.',
            'daily_rate.min' => 'Tarif harian tidak boleh negatif.',
            'last_service_at.required' => 'Tanggal servis terakhir wajib diisi.',
            'last_service_at.date' => 'Tanggal servis terakhir harus berupa tanggal yang valid.',
        ]);

        // Unchecked HTML checkboxes are omitted from POST payloads; normalize to boolean.
        $validated['is_available'] = $request->boolean('is_available');

        return $validated;
    }
}
