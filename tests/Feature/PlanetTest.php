<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function une_planete_ne_peut_avoir_qu_un_type_valide()
    {
        $response = $this->post('/planets', [
            'name' => 'ExoPlanet-X',
            'type' => 'InvalidType',
            'size' => 10000,
            'distance' => 400.5,
            'gravity' => 9.8,
            'atmosphere' => 'N78% - O2.1%'
        ]);

        $response->assertSessionHasErrors('type');
    }

    public function test_creation_planete_avec_valeurs_negatives_echoue()
{
    $response = $this->post('/planets', [
        'name' => 'TestPlanet',
        'type' => 'Terrestrial',
        'size' => -1000,
        'mass' => -10,
        'distance' => -200,
        'gravity' => -9.8,
        'atmosphere' => 'N 78% - O₂ 21%'
    ]);

    $response->assertSessionHasErrors(['size', 'mass', 'distance', 'gravity']);
    }

public function test_atmosphere()
    {
        $response = $this->post('/planets', [
            'name' => 'TestPlanet',
            'type' => 'Terrestrial',
            'size' => 10000,
            'mass' => 10,
            'distance' => 400.5,
            'gravity' => 9.8,
            'atmosphere' => '78% - O2 21%'
        ]);

        $response->assertSessionHasErrors('atmosphere');
    }

    /** @test */
    public function test_valide()
    {
        $response = $this->post('/planets', [
            'name' => 'Mars',
            'type' => 'Terrestrial',
            'size' => 6779,
            'mass' => 0.107,
            'distance' => 227.9,
            'gravity' => 3.7,
            'atmosphere' => 'CO₂ 95% - Ar 2%'
        ]);

        $response->assertSessionDoesntHaveErrors();
    }
}
