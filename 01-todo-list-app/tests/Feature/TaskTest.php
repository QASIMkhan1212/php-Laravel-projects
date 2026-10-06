<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_loads(): void
    {
        $this->get('/tasks')->assertOk();
    }

    public function test_can_create_record(): void
    {
        $payload = ['title' => 'Finish Laravel CRUD project', 'description' => 'Build and push to GitHub', 'due_date' => '2026-10-20', 'is_completed' => false];

        $this->post('/tasks', $payload)->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', ['title' => 'Finish Laravel CRUD project']);
    }

    public function test_validation_fails_with_empty_data(): void
    {
        $this->post('/tasks', [])->assertSessionHasErrors(['title']);
    }

    public function test_can_delete_record(): void
    {
        $payload = ['title' => 'Finish Laravel CRUD project', 'description' => 'Build and push to GitHub', 'due_date' => '2026-10-20', 'is_completed' => false];
        $this->post('/tasks', $payload);

        $id = \Illuminate\Support\Facades\DB::table('tasks')->value('id');
        $this->delete('/tasks/' . $id)->assertRedirect('/tasks');
        $this->assertDatabaseCount('tasks', 0);
    }
}
