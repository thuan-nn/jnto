<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(20)->create();

        $users->each(function ($user, $key) {
            $photo = Photo::factory()->make([
                'user_id' => $user->id,
            ]);

            $photo->save();
        });

        $photos = Photo::all();

        $photos->each(function (Photo $photo, $key) {
            $file = File::factory()->create();

            $photo->files()->attach($file->id);
        });
    }
}
