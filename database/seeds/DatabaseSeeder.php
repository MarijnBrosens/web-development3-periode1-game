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
        Model::unguard();

        $this->call('UsersSeeder');
        $this->call('PeriodsSeeder');
        $this->call('PhotosSeeder');
        $this->call('RolesSeeder');
        $this->call('RoleUserSeeder');
        $this->call('VotesSeeder');

        // $this->call(UserTableSeeder::class);

        //Model::reguard();
    }
}
