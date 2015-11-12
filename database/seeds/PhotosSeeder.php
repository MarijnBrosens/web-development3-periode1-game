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
                'title' => 'spitzen',
                'slug' => 'spitzen',
                'content' => 'big mountain in the alps',
                'image' => 'uploads/pictures/period-1/1447298970-spitzen.jpg',
                'thumb' => 'uploads/pictures/period-1/1447298970-spitzen-thumb.jpg',
                'user_id' => '1',
                'period_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'title' => 'Autumn leafs',
                'slug' => 'autumn-leafs',
                'content' => 'Autumn leafs in the forest in germany',
                'image' => 'uploads/pictures/period-1/1447299045-autumn-leafs.jpg',
                'thumb' => 'uploads/pictures/period-1/1447299045-autumn-leafs-thumb.jpg',
                'user_id' => '2',
                'period_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 3,
                'title' => 'foggy trees',
                'slug' => 'foggy-trees',
                'content' => 'foggy trees in australia',
                'image' => 'uploads/pictures/period-1/1447299100-foggy-trees.jpg',
                'thumb' => 'uploads/pictures/period-1/1447299100-foggy-trees-thumb.jpg',
                'user_id' => '3',
                'period_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 4,
                'title' => 'red sky mountains',
                'slug' => 'red-sky-mountains',
                'content' => 'sunset mountains in norwey',
                'image' => 'uploads/pictures/period-1/1447299166-red-sky-mountains.jpg',
                'thumb' => 'uploads/pictures/period-1/1447299166-red-sky-mountains-thumb.jpg',
                'user_id' => '4',
                'period_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 5,
                'title' => 'northern lights',
                'slug' => 'northern-lights',
                'content' => 'island',
                'image' => 'uploads/pictures/period-1/1447299229-northern-lights.jpg',
                'thumb' => 'uploads/pictures/period-1/1447299229-northern-lights-thumb.jpg',
                'user_id' => '3',
                'period_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 6,
                'title' => 'sunset bridge',
                'slug' => 'sunset-bridge',
                'content' => 'austria',
                'image' => 'uploads/pictures/period-1/1447299296-sunset-bridge.jpg',
                'thumb' => 'uploads/pictures/period-1/1447299296-sunset-bridge-thumb.jpg',
                'user_id' => '2',
                'period_id' => '1',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 7,
                'title' => 'bluewater',
                'slug' => 'blue-water',
                'content' => 'crete greece',
                'image' => 'uploads/pictures/period-2/1447299342-blue-water.jpg',
                'thumb' => 'uploads/pictures/period-2/1447299342-blue-water-thumb.jpg',
                'user_id' => '1',
                'period_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 8,
                'title' => 'rainforest',
                'slug' => 'rainforest',
                'content' => 'Philippines',
                'image' => 'uploads/pictures/period-2/1447299477-rainforest.jpg',
                'thumb' => 'uploads/pictures/period-2/1447299477-rainforest-thumb.jpg',
                'user_id' => '2',
                'period_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 9,
                'title' => 'kos blue water',
                'slug' => 'kos-blue-water',
                'content' => 'greece',
                'image' => 'uploads/pictures/period-2/1447299516-kos-blue-water.jpg',
                'thumb' => 'uploads/pictures/period-2/1447299516-kos-blue-water-thumb.jpg',
                'user_id' => '3',
                'period_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 10,
                'title' => 'lake',
                'slug' => 'lake',
                'content' => 'mountain city',
                'image' => 'uploads/pictures/period-2/1447299536-lake.jpg',
                'thumb' => 'uploads/pictures/period-2/1447299536-lake-thumb.jpg',
                'user_id' => '4',
                'period_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 11,
                'title' => 'dark red sky',
                'slug' => 'dark-red-sky',
                'content' => 'redskyland',
                'image' => 'uploads/pictures/period-2/1447299579-dark-red-sky.jpg',
                'thumb' => 'uploads/pictures/period-2/1447299579-dark-red-sky-thumb.jpg',
                'user_id' => '3',
                'period_id' => '2',
                'created_at' => Carbon\Carbon::now()
            ],
            [
                'id' => 12,
                'title' => 'sweiss trees',
                'slug' => 'sweiss-trees',
                'content' => 'highway sweiss',
                'image' => 'uploads/pictures/period-3/1447299635-sweiss-trees.jpg',
                'thumb' => 'uploads/pictures/period-3/1447299635-sweiss-trees-thumb.jpg',
                'user_id' => '2',
                'period_id' => '3',
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
