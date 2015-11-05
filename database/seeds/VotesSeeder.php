<?php

use Illuminate\Database\Seeder;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votes = [
            [
                'id' => 1,
                'ip' => '192.168.60.300',
                'voted' => 0,
                'user_id' => '1',
                'photo_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
        ];

        DB::table('votes')->insert($votes);

        $this->command->info('Votes added to the database');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('periods');
    }
}
