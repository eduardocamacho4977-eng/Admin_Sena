<?php

namespace Tests\Feature;

use App\Models\Area;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AreaSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_filters_areas_by_name_from_the_index_page(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'role' => User::ROLE_ADMINISTRATOR,
        ]);

        $this->actingAs($admin);

        $matchingArea = Area::create(['name' => 'Sistemas']);
        Area::create(['name' => 'Contabilidad']);

        $response = $this->get(route('area.index', ['search' => 'siste']));

        $response->assertOk();
        $response->assertViewHas('areas', function ($areas) use ($matchingArea) {
            return $areas->contains($matchingArea) && $areas->count() === 1;
        });
        $response->assertSee($matchingArea->name);
        $response->assertDontSee('Contabilidad');
    }
}
