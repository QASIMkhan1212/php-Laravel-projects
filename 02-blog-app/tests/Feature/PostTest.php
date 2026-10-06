<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_loads(): void
    {
        $this->get('/posts')->assertOk();
    }

    public function test_can_create_record(): void
    {
        $payload = ['title' => 'Getting Started with Laravel', 'author' => 'Qasim', 'body' => 'Laravel is a PHP framework that makes building web apps clean and enjoyable. In this post we set up our first project.'];

        $this->post('/posts', $payload)->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', ['title' => 'Getting Started with Laravel']);
    }

    public function test_validation_fails_with_empty_data(): void
    {
        $this->post('/posts', [])->assertSessionHasErrors(['title']);
    }

    public function test_can_delete_record(): void
    {
        $payload = ['title' => 'Getting Started with Laravel', 'author' => 'Qasim', 'body' => 'Laravel is a PHP framework that makes building web apps clean and enjoyable. In this post we set up our first project.'];
        $this->post('/posts', $payload);

        $id = \Illuminate\Support\Facades\DB::table('posts')->value('id');
        $this->delete('/posts/' . $id)->assertRedirect('/posts');
        $this->assertDatabaseCount('posts', 0);
    }
}
