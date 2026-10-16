<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_mahasiswa_can_be_searched_by_nim(): void
    {
        Mahasiswa::create([
            'nama' => 'Citra Lestari',
            'nim' => '20240001',
            'email' => 'aisyah@example.test',
        ]);
        Mahasiswa::create([
            'nama' => 'Bima Santoso',
            'nim' => '20240002',
            'email' => 'bima@example.test',
        ]);

        $response = $this->get('/mahasiswa?search=20240002');

        $response->assertOk();
        $response->assertSee('Bima Santoso');
        $response->assertDontSee('Citra Lestari');
    }
}
