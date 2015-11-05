<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'admin', 'display_name' => 'Admin', 'description' => 'Somebody who has access to all the administration features within the site.'],
            ['id' => 2, 'name' => 'subscriber', 'display_name' => 'Subscriber', 'description' => 'Somebody who can publish and manage their own posts and manage their profiel.'],
        ];
        DB::table('roles')->insert($roles);

        $this->command->info('User roles added to the database');
    }
}
