<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['title' => 'Getting Started with Laravel', 'author' => 'Qasim', 'body' => 'Laravel is a PHP framework that makes building web apps clean and enjoyable. In this post we set up our first project.'],
            ['title' => 'Understanding MVC', 'author' => 'Qasim', 'body' => 'Models hold data, Views render it and Controllers connect the two. This separation keeps code easy to maintain.'],
        ];

        foreach ($rows as $row) {
            Post::create($row);
        }
    }
}
