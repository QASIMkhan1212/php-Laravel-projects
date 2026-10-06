<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_loads(): void
    {
        $this->get('/contacts')->assertOk();
    }

    public function test_can_create_record(): void
    {
        $payload = ['name' => 'Ali Raza', 'phone' => '0300-1234567', 'email' => 'ali@example.com', 'address' => 'Karachi'];

        $this->post('/contacts', $payload)->assertRedirect('/contacts');
        $this->assertDatabaseHas('contacts', ['name' => 'Ali Raza']);
    }

    public function test_validation_fails_with_empty_data(): void
    {
        $this->post('/contacts', [])->assertSessionHasErrors(['name']);
    }

    public function test_can_delete_record(): void
    {
        $payload = ['name' => 'Ali Raza', 'phone' => '0300-1234567', 'email' => 'ali@example.com', 'address' => 'Karachi'];
        $this->post('/contacts', $payload);

        $id = \Illuminate\Support\Facades\DB::table('contacts')->value('id');
        $this->delete('/contacts/' . $id)->assertRedirect('/contacts');
        $this->assertDatabaseCount('contacts', 0);
    }
}
