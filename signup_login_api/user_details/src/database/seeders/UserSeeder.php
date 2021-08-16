<?php

namespace Database\Seeders;

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
        DB::table("User_details")->insert(array(
          "firstname"=>"admin",
          "middlename"=>"admin",
          "lastname"=>"admin",
          "email"=>"admin@admin.com",
          "password"=>"38f629170ac3ab74b9d6d2cc411c2f3c",
          "access"=>'[{"url":"pms"},{"url":"crm"},{"url":"hrms"}]',
          "status"=>1,
          "role"=>"management",
        ));
    }
}
