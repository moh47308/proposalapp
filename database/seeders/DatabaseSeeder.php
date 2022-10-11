<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
     public function run()
    {
         $this->call([
              CompanyTypesSeeder::class,
              ServiceTypeSeeder::class,
              UserSeeder::class,
              ClientSeeder::class,
              ServicesSeeder::class,
              Bundel::class,
         ]);
    }
}
