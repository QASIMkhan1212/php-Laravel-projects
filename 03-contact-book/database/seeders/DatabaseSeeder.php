<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['name' => 'Ali Raza', 'phone' => '0300-1234567', 'email' => 'ali@example.com', 'address' => 'Karachi'],
            ['name' => 'Sara Khan', 'phone' => '0321-7654321', 'email' => 'sara@example.com', 'address' => 'Lahore'],
            ['name' => 'Ahmed Noor', 'phone' => '0333-1112223', 'email' => null, 'address' => null],
        ];

        foreach ($rows as $row) {
            Contact::create($row);
        }
    }
}
