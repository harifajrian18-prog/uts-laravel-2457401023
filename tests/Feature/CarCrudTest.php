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
}
