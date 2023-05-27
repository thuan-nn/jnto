<?php

namespace App\Http\Controllers\Web;

use App\Models\Banner;
use App\Models\Story;
use Illuminate\Routing\Controller;

class StoryController extends Controller
{
    /**
     * @param \App\Models\Story|null $story
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Story $story = null)
    {
        $randomStories = Story::query()->inRandomOrder()->whereIsApproved(true)->take(60)->get();
        $banners = Banner::query()->take(5)->latest()->get();
        if ($banners->count() === 0) {
            $banners = Banner::query()->latest()->take(3)->get();
        }

        /*SEO*/
        $meta = [
            'title'       => trans('seo-story.general_title'),
            'description' => $story ? $story->content : trans('seo.general_description'),
            'url'         => $story ? route('story', ['story' => $story->id]) : route('story'),
            'image'       => count($banners) ?  getFileUrl(optional($banners->first()->files()->first())->path) : '',
            'type'        => trans('seo.type')
        ];

        return view('campaigns.stories.index', [
            'title'       => trans('seo-story.general_title'),
            'story'       => ($story && $story->is_approved) ? Story::transform($story) : '',
            'listStories' => count($randomStories) ? Story::transform($randomStories) : [],
            'banners'     => count($banners) ? Banner::transform($banners) : [],
            'meta'        => $meta
        ]);
    }
}
