<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        DB::table('users')->insert([
            'firstname' => 'Роман',
            'lastname' => 'Зыков',
            'alias' => 'Admin',
            'email' => 'lazorcast@yandex.ru',
            'password' => bcrypt('secret'),
        ]);
    }
}
