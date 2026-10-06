<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['title' => 'Groceries', 'amount' => 45.5, 'category' => 'Food', 'spent_on' => '2026-10-01'],
            ['title' => 'Bus pass', 'amount' => 20, 'category' => 'Transport', 'spent_on' => '2026-10-02'],
            ['title' => 'Electricity bill', 'amount' => 80.25, 'category' => 'Bills', 'spent_on' => '2026-10-03'],
        ];

        foreach ($rows as $row) {
            Expense::create($row);
        }
    }
}
