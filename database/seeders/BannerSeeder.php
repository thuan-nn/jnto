<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\File;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = Banner::factory()->count(10)->create();

        $banners->each(function (Banner $banner, $key){
            $file = File::factory()->create();

            $banner->files()->attach($file->id);
        });
    }
}
