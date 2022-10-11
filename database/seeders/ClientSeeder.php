<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'Maliks Company',
            'first_name'   => 'Malik',
            'middle_name'   => 'Hamza',
            'last_name' => 'Rehman',
            'email'   => 'moh47308@gmail.com',
            'phone'=> '78356735686',
            'address_line_1' => 'Islamabad',
            'address_line_2' => 'Karachi',
            'address_line_3' => 'Lahore',
            'city' => 'Peshawar',
            'country' => 'United Kindom',
            'post_code' => '5454',
            'company_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
