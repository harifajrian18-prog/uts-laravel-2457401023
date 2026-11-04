<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CarCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_cars_table_has_expected_columns(): void
    {
        $this->assertTrue(Schema::hasTable('cars'));
        $this->assertTrue(Schema::hasColumns('cars', [
            'id',
            'brand',
            'model',
            'plate_number',
            'year',
            'daily_rate',
            'last_service_at',
            'is_available',
            'notes',
        ]));
    }

    public function test_home_page_displays_app_title_description_link_and_footer(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Manajemen Rental Mobil');
        $response->assertSee('Muhammad Hari Fazrian · 2457401023');
        $response->assertSee('/cars');
    }

    public function test_index_displays_empty_message_when_no_cars(): void
    {
        $this->get('/cars')
            ->assertStatus(200)
            ->assertSee('Belum ada data')
            ->assertSee('Muhammad Hari Fazrian · 2457401023');
    }

    public function test_can_create_car_and_see_success_message(): void
    {
        $response = $this->post('/cars', [
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'plate_number' => 'B 1234 KJA',
            'year' => 2021,
            'daily_rate' => 350000,
            'last_service_at' => '2026-09-12',
            'is_available' => '1',
            'notes' => 'Transmisi manual',
        ]);

        $response->assertRedirect('/cars');
        $this->assertDatabaseHas('cars', [
            'plate_number' => 'B 1234 KJA',
            'is_available' => 1,
        ]);
        $this->get('/cars')->assertSee('Data mobil berhasil ditambahkan.');
    }

    public function test_store_validation_rejects_invalid_brand_and_missing_fields(): void
    {
        $response = $this->from('/cars/create')->post('/cars', [
            'brand' => 'Suzuki',
            'model' => '',
            'plate_number' => '',
            'year' => 'bukan-angka',
            'daily_rate' => -100,
            'last_service_at' => 'bukan-tanggal',
        ]);

        $response->assertRedirect('/cars/create');
        $response->assertSessionHasErrors([
            'brand',
            'model',
            'plate_number',
            'year',
            'daily_rate',
            'last_service_at',
        ]);
    }

    public function test_can_view_car_detail_edit_update_and_delete(): void
    {
        $car = \App\Models\Car::create([
            'brand' => 'Honda',
            'model' => 'Brio',
            'plate_number' => 'B 2045 TRS',
            'year' => 2022,
            'daily_rate' => 300000,
            'last_service_at' => '2026-10-01',
            'is_available' => true,
            'notes' => 'Catatan awal',
        ]);

        $this->get("/cars/{$car->id}")
            ->assertStatus(200)
            ->assertSee('B 2045 TRS')
            ->assertSee('Catatan awal');

        $this->get("/cars/{$car->id}/edit")
            ->assertStatus(200)
            ->assertSee('value="B 2045 TRS"', false)
            ->assertSee('value="2026-10-01"', false);

        $this->put("/cars/{$car->id}", [
            'brand' => 'Hyundai',
            'model' => 'Creta',
            'plate_number' => 'D 1789 AB',
            'year' => 2023,
            'daily_rate' => 500000,
            'last_service_at' => '2026-08-20',
            'notes' => 'Termasuk asuransi',
        ])->assertRedirect('/cars');

        $this->assertDatabaseHas('cars', [
            'id' => $car->id,
            'brand' => 'Hyundai',
            'plate_number' => 'D 1789 AB',
            'is_available' => 0,
        ]);

        $this->delete("/cars/{$car->id}")->assertRedirect('/cars');
        $this->assertDatabaseMissing('cars', ['id' => $car->id]);
    }
}
