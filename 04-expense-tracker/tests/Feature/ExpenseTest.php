<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_loads(): void
    {
        $this->get('/expenses')->assertOk();
    }

    public function test_can_create_record(): void
    {
        $payload = ['title' => 'Groceries', 'amount' => 45.5, 'category' => 'Food', 'spent_on' => '2026-10-01'];

        $this->post('/expenses', $payload)->assertRedirect('/expenses');
        $this->assertDatabaseHas('expenses', ['title' => 'Groceries']);
    }

    public function test_validation_fails_with_empty_data(): void
    {
        $this->post('/expenses', [])->assertSessionHasErrors(['title']);
    }

    public function test_can_delete_record(): void
    {
        $payload = ['title' => 'Groceries', 'amount' => 45.5, 'category' => 'Food', 'spent_on' => '2026-10-01'];
        $this->post('/expenses', $payload);

        $id = \Illuminate\Support\Facades\DB::table('expenses')->value('id');
        $this->delete('/expenses/' . $id)->assertRedirect('/expenses');
        $this->assertDatabaseCount('expenses', 0);
    }
}
