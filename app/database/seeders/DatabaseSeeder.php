<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Receiver;
use App\Models\Sender;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Company::factory(1)->create();
         Sender::factory(1)->create();
         Receiver::factory(1)->create();
    }
}
