<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_types')->insert([
            'name'   => 'Limited Company',
            'status' => '1',
            'slug'   => 'lc',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('company_types')->insert([
            'name'   => 'Limited Liability Partnership',
            'status' => '1',
            'slug'   => 'llp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('company_types')->insert([
            'name'   => 'Sole Trader',
            'status' => '1',
            'slug'   => 'st',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
