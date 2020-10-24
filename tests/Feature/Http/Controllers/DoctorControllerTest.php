<?php

namespace Tests\Feature\Http\Controllers;

use App\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DoctorController
 */
class DoctorControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $doctors = Doctor::factory()->count(3)->create();

        $response = $this->get(route('doctor.index'));

        $response->assertOk();
        $response->assertViewIs('doctor.index');
        $response->assertViewHas('doctors');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $doctors = Doctor::factory()->count(3)->create();

        $response = $this->get(route('doctor.create'));

        $response->assertOk();
        $response->assertViewIs('doctor.create');
        $response->assertViewHas('doctors');
    }


    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('doctor.store'));

        $response->assertRedirect(route('doctor.index'));

        $this->assertDatabaseHas(doctors, [ /* ... */ ]);
    }
}
