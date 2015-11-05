<?php

use Illuminate\Database\Seeder;

class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = [
            [
                'id' => 1,
                'title' => 'photo 1',
                'slug' => 'photo-1',
                'content' => 'A4',
                'image' => 'uploads/pictures/period-2/1446606779-teste.jpg',
                'thumb' => 'uploads/pictures/period-2/1446606779-teste-thumb.jpg',
                'user_id' => '1',
                'period_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'title' => 'photo 2',
                'slug' => 'photo-2',
                'content' => 'a3',
                'image' => 'uploads/pictures/period-2/1446606779-teste.jpg',
                'thumb' => 'uploads/pictures/period-2/1446606779-teste-thumb.jpg',
                'user_id' => '2',
                'period_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
        ];

        DB::table('photos')->insert($photos);

        $this->command->info('Photos added to the database');
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
