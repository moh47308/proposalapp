<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'description'   => 'Limited Company',
            'value' => '100',
            'service_title'   => 'One Off',
            'service_type_id' => '1',
            'company_id' => '1',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('services')->insert([
            'description'   => 'Limited Company',
            'value' => '100',
            'service_title'   => 'Monthly',
            'service_type_id' => '2',
            'company_id' => '1',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('services')->insert([
            'description'   => 'Limited Company',
            'value' => '100',
            'service_title'   => 'Quarterly',
            'service_type_id' => '3',
            'company_id' => '1',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('services')->insert([
            'description'   => 'Limited Company',
            'value' => '100',
            'service_title'   => 'Annual',
            'service_type_id' => '4',
            'company_id' => '1',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('services')->insert([
            'description'   => 'Limited Company',
            'value' => '100',
            'service_title'   => 'Volume Base',
            'service_type_id' => '5',
            'company_id' => '1',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        /*DB::table('services')->insert([
            'description'   => 'Limited Company',
            'value' => '[100 , 200, 300, 400]',
            'service_title'   => 'Range Base',
            'service_type_id' => '6',
            'company_id' => '1',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);*/
    }
}
