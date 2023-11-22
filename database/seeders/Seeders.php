<?php

namespace Database\Seeders;

use App\Models\County;
use App\Models\CrimeType;
use Illuminate\Database\Seeder;

class Seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        County::create([
            'name' =>  'Narok'
        ]);

        County::create([
            'name' =>  'Embu'
        ]);


        County::create([
            'name' =>  'Marsabit'
        ]);


        County::create([
            'name' =>  'Kisumu'
        ]);

        County::create([
            'name' =>  'Nakuru'
        ]);



        CrimeType::create([
            'name' =>  'Corruption'
        ]);

        CrimeType::create([
            'name' =>  'Sex Offence'
        ]);


        CrimeType::create([
            'name' =>  'GBV'
        ]);


        CrimeType::create([
            'name' =>  'Robbery'
        ]);

        CrimeType::create([
            'name' =>  'Rape'
        ]);

    }
}
