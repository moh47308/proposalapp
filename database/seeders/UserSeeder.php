<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'   => 'Arslan',
            'last_name' => 'Ahmad',
            'email'   => 'admin@gmail.com',
            'password'=> bcrypt('admin123'),
            'contact' => '099999999999',
            'company_id' => DB::table('companies')->insertGetId([
            'name' => 'Dimond Company',
            'packages_id' => DB::table('packages')->insertGetId([
            'package_name'   => 'Free',
            'price' => '100',
            'proposal_per_month'   => '2',
            'client_per_year'=> '5',
            'plan_id' => 'abcd',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()]),
            'role_id' => DB::table('roles')->insertGetId([
            'name'   => 'Admin',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()]),
            'terms' => '1',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'first_name'   => 'Malik',
            'last_name' => 'Hamza',
            'email'   => 'hamza@gmail.com',
            'password'=> bcrypt('hamza123'),
            'contact' => '088888888888',
            'company_id' => DB::table('companies')->insertGetId([
            'name' => "Malik's Company",
            'packages_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()]),
            'role_id' => DB::table('roles')->insertGetId([
            'name'   => 'User',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()]),
            'terms' => '1',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
