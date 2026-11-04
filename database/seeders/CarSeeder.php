<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        Car::query()->delete();

        $cars = [
            [
                'brand' => 'Toyota',
                'model' => 'Avanza',
                'plate_number' => 'B 1234 KJA',
                'year' => 2021,
                'color' => 'Putih',
                'daily_rate' => 350000,
                'last_service_at' => '2026-09-12',
                'is_available' => true,
                'notes' => 'Transmisi manual',
            ],
            [
                'brand' => 'Honda',
                'model' => 'Brio',
                'plate_number' => 'B 2045 TRS',
                'year' => 2022,
                'color' => 'Kuning',
                'daily_rate' => 300000,
                'last_service_at' => '2026-10-01',
                'is_available' => false,
                'notes' => null,
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'Creta',
                'plate_number' => 'D 1789 AB',
                'year' => 2023,
                'color' => 'Hitam',
                'daily_rate' => 500000,
                'last_service_at' => '2026-08-20',
                'is_available' => true,
                'notes' => 'Termasuk asuransi',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Innova Zenix',
                'plate_number' => 'B 8821 PQR',
                'year' => 2024,
                'color' => 'Hitam',
                'daily_rate' => 650000,
                'last_service_at' => '2026-10-15',
                'is_available' => true,
                'notes' => 'Transmisi matic, 7 penumpang',
            ],
            [
                'brand' => 'Honda',
                'model' => 'HR-V',
                'plate_number' => 'B 4410 KLM',
                'year' => 2023,
                'color' => 'Putih',
                'daily_rate' => 550000,
                'last_service_at' => '2026-09-28',
                'is_available' => true,
                'notes' => 'Kondisi ban baru diganti',
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'Stargazer',
                'plate_number' => 'F 1923 HG',
                'year' => 2023,
                'color' => 'Abu-abu',
                'daily_rate' => 420000,
                'last_service_at' => '2026-10-05',
                'is_available' => false,
                'notes' => 'Sedang disewa mingguan',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Rush',
                'plate_number' => 'B 7391 TUV',
                'year' => 2022,
                'color' => 'Silver',
                'daily_rate' => 400000,
                'last_service_at' => '2026-08-30',
                'is_available' => true,
                'notes' => 'Cocok untuk perjalanan luar kota',
            ],
            [
                'brand' => 'Honda',
                'model' => 'BR-V',
                'plate_number' => 'D 5562 XY',
                'year' => 2022,
                'color' => 'Merah',
                'daily_rate' => 430000,
                'last_service_at' => '2026-09-18',
                'is_available' => true,
                'notes' => null,
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'Ioniq 5',
                'plate_number' => 'B 1029 EV',
                'year' => 2024,
                'color' => 'Silver',
                'daily_rate' => 850000,
                'last_service_at' => '2026-10-22',
                'is_available' => true,
                'notes' => 'Mobil listrik, termasuk portable charger',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Calya',
                'plate_number' => 'B 3319 EFG',
                'year' => 2020,
                'color' => 'Putih',
                'daily_rate' => 280000,
                'last_service_at' => '2026-07-19',
                'is_available' => true,
                'notes' => 'Irit bahan bakar',
            ],
            [
                'brand' => 'Honda',
                'model' => 'City Hatchback',
                'plate_number' => 'B 9082 JKL',
                'year' => 2023,
                'color' => 'Abu-abu',
                'daily_rate' => 480000,
                'last_service_at' => '2026-10-11',
                'is_available' => false,
                'notes' => 'Menunggu jadwal cuci interior',
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'Santa Fe',
                'plate_number' => 'B 6640 MNO',
                'year' => 2023,
                'color' => 'Biru',
                'daily_rate' => 750000,
                'last_service_at' => '2026-09-25',
                'is_available' => true,
                'notes' => 'Mesin diesel, termasuk asuransi all-risk',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Raize',
                'plate_number' => 'D 2457 HFR',
                'year' => 2024,
                'color' => 'Merah',
                'daily_rate' => 380000,
                'last_service_at' => '2026-10-28',
                'is_available' => true,
                'notes' => 'Unit terbaru tahun 2024',
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
