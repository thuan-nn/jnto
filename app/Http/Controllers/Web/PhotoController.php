<?php

namespace App\Http\Controllers\Web;

use App\Enums\CampaignRegisterType;
use App\Models\Banner;
use App\Models\Photo;
use Illuminate\Routing\Controller;

class PhotoController extends Controller
{
    /**
     * @param Photo|null $photo
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function index(Photo $photo = null)
    {
        $randomPhotos = Photo::query()->inRandomOrder()->whereIsApproved(true)->take(90)->get();
        $banners = Banner::query()->where('is_selected', true)->take(3)->oldest()->get();
        if ($banners->count() === 0) {
            $banners = Banner::query()->latest()->take(3)->get();
        }

        /*SEO*/
        $meta = [
            'title'       => trans('seo.general_title'),
            'description' => $photo ? $photo->description : trans('seo.general_description'),
            'url'         => $photo ? route('photo', ['photo' => $photo->id]) : route('photo'),
            'image'       => $photo ? getFileUrl(optional($photo->files->first())->path)
                : (count($banners) ? getFileUrl(optional($banners->first()->files()->first())->path) : ''),
            'type'        => trans('seo.type')
        ];

        return view('campaigns.photos.index', [
            'type'       => CampaignRegisterType::PHOTO,
            'title'      => trans('seo.general_title'),
            'photo'      => ($photo && $photo->is_approved) ? json_encode(Photo::transform($photo)) : '',
            'listPhotos' => count($randomPhotos) ? Photo::transform($randomPhotos) : [],
            'banners'    => count($banners) ? Banner::transform($banners) : [],
            'meta'       => $meta,
        ]);
    }
}
