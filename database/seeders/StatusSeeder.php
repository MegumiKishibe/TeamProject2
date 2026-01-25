<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'まだある'],
            ['name' => 'もうない'],
        ];

        foreach ($statuses as $status) {
            Status::firstorCreate($status);
        }
    }
}
