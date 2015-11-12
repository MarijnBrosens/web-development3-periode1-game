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
                'voted' => 1,
                'user_id' => '1',
                'photo_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '2',
                'photo_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 3,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '3',
                'photo_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 4,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '4',
                'photo_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 5,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '1',
                'photo_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 6,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '2',
                'photo_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],[
                'id' => 7,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '3',
                'photo_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 8,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '1',
                'photo_id' => '3',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 9,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '1',
                'photo_id' => '8',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 10,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '2',
                'photo_id' => '8',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 11,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '3',
                'photo_id' => '8',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 12,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '4',
                'photo_id' => '8',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 13,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '1',
                'photo_id' => '9',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 14,
                'ip' => '192.168.60.300',
                'voted' => 1,
                'user_id' => '2',
                'photo_id' => '9',
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
