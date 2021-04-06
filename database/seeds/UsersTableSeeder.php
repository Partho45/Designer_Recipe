<?php

use Illuminate\Database\Seeder;

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
            'role_id' => '1',
            'name' => 'Partho Ghosh',
            'email' => 'parthoghosh960@gmail.com',
            'age' => '24',
            'contact' => '01761039591',
            'password' => bcrypt('10101010'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Fahim Ahmed',
            'email' => 'fahim.sh1996@gmail.com',
            'age' => '25',
            'contact' => '01712121212',
            'password' => bcrypt('10101010'),
        ]);
    }
}


