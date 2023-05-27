<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
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
            $story = Story::factory()->make([
                'user_id' => $user->id,
            ]);

            $story->save();
        });
    }
}
