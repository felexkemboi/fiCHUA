<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\CrimeType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([ Seeders::class ]);

    }
}
