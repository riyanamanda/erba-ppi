<?php

namespace Tests\Feature;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DokterTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    private User $superadmin;

    public function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'ipcn']);

        $this->user = User::factory()->create();
        $this->superadmin = User::factory()->create();

        $this->superadmin->assignRole('superadmin');
    }

    public function test_tampil_halaman_data_dokter()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('dokter.index'));

        $response->assertStatus(200);
    }

    public function test_superadmin_dapat_input_data_dokter()
    {
        $dokter = [
            'nama' => 'Dokter',
            'spesialis' => 'spesialis',
        ];

        $response = $this
            ->actingAs($this->superadmin)
            ->post(route('dokter.store', $dokter));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('dokter.index');

        $this->assertDatabaseHas('dokter', $dokter);
    }

    public function test_superadmin_dapat_update_data_dokter()
    {
        Dokter::factory()->create();

        $data = Dokter::first();
        $dokter = [
            'nama' => 'updated',
            'spesialis' => 'updated',
        ];

        $response = $this
            ->actingAs($this->superadmin)
            ->patch(route('dokter.update', $data), $dokter);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('dokter.index');

        $this->assertEquals($dokter['nama'], Dokter::first()->nama);
    }

    public function test_superadmin_dapat_delete_data_dokter()
    {
        Dokter::factory()->create();

        $dokter = Dokter::first();

        $response = $this
            ->actingAs($this->superadmin)
            ->delete(route('dokter.destroy', $dokter));

        $response->assertStatus(302);
        $response->assertRedirectToRoute('dokter.index');

        $this->assertDatabaseCount('dokter', 0);
    }

    public function test_non_superadmin_tidak_dapat_delete_data_dokter()
    {
        Dokter::factory()->create();

        $dokter = Dokter::first();

        $response = $this
            ->actingAs($this->user)
            ->delete(route('dokter.destroy', $dokter));

        $response->assertStatus(403);
    }
}
