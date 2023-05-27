<?php

namespace App\Http\Controllers\Web;

use App\Actions\CheckSharedAction;
use App\Enums\CampaignRegisterType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSharingRedirectRequest;
use App\Services\FacebookService;
use Facebook\Exceptions\FacebookSDKException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SharingController extends Controller
{
    /**
     * Redirect to login facebook page
     *
     * @param \App\Http\Requests\CreateSharingRedirectRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(CreateSharingRedirectRequest $request){
        $facebook = new FacebookService();
        $helper = $facebook->getRedirectLoginHelper();
        // set callback url
        $loginUrl = $helper->getLoginUrl(route('share.callback'));

        Session::put('campaign_id', $request->campaign_id);
        Session::put('type', $request->type);

        // redirect to login page
        return redirect()->away($loginUrl);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Actions\CheckSharedAction $checkSharedAction
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request, CheckSharedAction $checkSharedAction) {

        $facebook = new FacebookService();
        $helper = $facebook->getRedirectLoginHelper();
        $helper->getPersistentDataHandler()->set('state', $request->state);
        try {
            $accessToken = $helper->getAccessToken();
            $userId = $facebook->get('/me?fields=id,name', $accessToken)->getGraphUser()->getId();
            // check shared
            if ($checkSharedAction->execute([
                'campaign_id' => Session::get('campaign_id'),
                'type'        => Session::get('type'),
                'user_id'     => $userId
            ])){
                // this user shared this post
                Session::flash('status', 'warning');
            }else {
                // return status success for authenticate facebook success
                Session::flash('user_id', $userId);
                Session::flash('status', 'success');

                // redirect to sharing page
                return redirect()->away($this->getSharingUrl());
            }
        } catch (FacebookSDKException $e) {
            // error when authenticate
            Session::flash('status', 'error');
        }

        return redirect(route('home'));
    }

    /**
     * @return mixed
     */
    protected function getSharingUrl (){
        $appId = config('facebook.app_id');
        $link = Session::get('type') === CampaignRegisterType::PHOTO ? route('photo', ['photo' => Session::get('campaign_id')]) :  route('story', ['story' => Session::get('campaign_id')]);
        $redirectUri = Session::get('type') === CampaignRegisterType::PHOTO ? route('photo') :  route('story');
        $hashtag = urlencode('#nhatbantoiyeu');
        $quote= 'https%3A%2F%2Fwww.japan.travel%2Fvi%2Fvn%2Fnhatbantoiyeu%0AChia%20s%E1%BA%BB%20ngay%20kho%E1%BA%A3nh%20kh%E1%BA%AFc%20t%E1%BA%A1i%20Nh%E1%BA%ADt%20B%E1%BA%A3n%20c%E1%BB%A7a%20b%E1%BA%A1n%20%C4%91%E1%BB%83%20nh%E1%BA%ADn%20%C4%91%C6%B0%E1%BB%A3c%20nh%E1%BB%AFng%20ph%E1%BA%A7n%20qu%C3%A0%20h%E1%BA%A5p%20d%E1%BA%ABn!';

        return "https://www.facebook.com/dialog/feed?app_id=$appId&link=$link&hashtag=$hashtag&quote=$quote&redirect_uri=$redirectUri";
    }
}
