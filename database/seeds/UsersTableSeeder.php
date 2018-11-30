<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'admin',
            'email'       => 'admin@mail.com',
			'password' => bcrypt('admin123'),
			'level' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
		DB::table('users')->insert([
            'name'      => 'author',
            'email'       => 'author@mail.com',
			'password' => bcrypt('author123'),
			'level' => 'author',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
		
		DB::table('users')->insert([
            'name'      => 'user',
            'email'       => 'user@mail.com',
			'password' => bcrypt('user123'),
			'level' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
