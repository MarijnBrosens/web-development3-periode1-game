<?php

use Illuminate\Database\Seeder;

class PeriodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = [
            [
                'id' => 1,
                'title' => 'Period 1',
                'start_date' => Carbon\Carbon::now(),
                'end_date' => Carbon\Carbon::now()->addMinute(5555555)->toDateTimeString()
            ],
            [
                'id' => 2,
                'title' => 'Period 2',
                'start_date' => Carbon\Carbon::now()->addMinute(5555555)->toDateTimeString(),
                'end_date' => Carbon\Carbon::now()->addMinute(5555556)->toDateTimeString()
            ],
            [
                'id' => 3,
                'title' => 'Period 3',
                'start_date' => Carbon\Carbon::now()->addMinute(5555556)->toDateTimeString(),
                'end_date' => Carbon\Carbon::now()->addMinute(5555557)->toDateTimeString()
            ],
            [
                'id' => 4,
                'title' => 'Period 4',
                'start_date' => Carbon\Carbon::now()->addMinute(5555557)->toDateTimeString(),
                'end_date' => Carbon\Carbon::now()->addMinute(5555558)->toDateTimeString()
            ],
        ];

        DB::table('periods')->insert($periods);

        $this->command->info('Periods added to the database');
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
