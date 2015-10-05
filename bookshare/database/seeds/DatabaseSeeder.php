<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'email' => 'joncromie@gmail.com',
            'first_name' => 'Jon',
            'last_name' => 'Cromie',
            'sex' => 'Male',
            'dob' => '1987-03-19',
            'phone' => '0447193506',
            'street' => '16 Bracken Ridge Rd',
            'suburb' => 'Sandgate',
            'post_code' => '4017',
            'state' => 'QLD',
            'password' => bcrypt('secret'),
        ]);
    }
}
