<?php

namespace Tests\Feature\Http\Controllers;

use App\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PatientController
 */
class PatientControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $patients = Patient::factory()->count(3)->create();

        $response = $this->get(route('patient.index'));

        $response->assertOk();
        $response->assertViewIs('patient.index');
        $response->assertViewHas('patients');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $patients = Patient::factory()->count(3)->create();

        $response = $this->get(route('patient.create'));

        $response->assertOk();
        $response->assertViewIs('patient.create');
        $response->assertViewHas('patients');
    }


    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('patient.store'));

        $response->assertRedirect(route('patient.index'));

        $this->assertDatabaseHas(patients, [ /* ... */ ]);
    }
}
