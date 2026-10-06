<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['title' => 'Finish Laravel CRUD project', 'description' => 'Build and push to GitHub', 'due_date' => '2026-10-20', 'is_completed' => false],
            ['title' => 'Update resume', 'description' => 'Add the five Laravel projects', 'due_date' => '2026-10-15', 'is_completed' => false],
            ['title' => 'Learn Eloquent relationships', 'description' => null, 'due_date' => null, 'is_completed' => true],
        ];

        foreach ($rows as $row) {
            Task::create($row);
        }
    }
}
