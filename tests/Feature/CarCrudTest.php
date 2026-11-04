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
}
