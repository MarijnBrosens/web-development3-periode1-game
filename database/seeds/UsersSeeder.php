<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'ip' =>'169.168.0.0', 'firstname' => 'Jef', 'lastname' => 'Janssens', 'email' => 'janssens.jef@gmail.com', 'password' => bcrypt('password123'),  'address' => 'Gemeentelaan 13', 'zip' => '2380', 'city' => 'Ravels', 'created_at'=> Carbon\Carbon::now()],
            ['id' => 2, 'ip' =>'169.168.0.1', 'firstname' => 'Marijn', 'lastname' => 'Brosens', 'email' => 'marijnbrosens16@gmail.com', 'password' => bcrypt('password123'), 'address' => 'Kerkstraat 1', 'zip' => '2980', 'city' => 'Zoersel', 'created_at'=> Carbon\Carbon::now()],
            ['id' => 3, 'ip' =>'169.168.0.2', 'firstname' => 'Sam', 'lastname' => 'Serrien', 'email' => 'serrien.sam@gmail.com', 'password' => bcrypt('password123'), 'address' => 'Geeneinde 103', 'zip' => '2300', 'city' => 'Antwerpen', 'created_at'=> Carbon\Carbon::now()],
        ];

        DB::table('users')->insert($users);

        $this->command->info('Users added to the database');
    }
}
