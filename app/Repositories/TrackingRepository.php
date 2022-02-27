<?php


namespace App\Repositories;

use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class TrackingRepository implements TrackingInterface
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|mixed
     */
    public function showTrackingLink()
    {
        $user = Auth::user()->id;
        $link = env('APP_URL').'analytics/'.Crypt::encryptString($user);
        return view('tracking.index',[
            'link' => $link
        ]);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function getDataFromLink($request)
    {
        Visitor::create([
            'user_agent' => $request->user_agent,
            'browser'    => $request->browser,
            'ip'         => $request->ip,
            'device'     => $request->device,
            'country'    => $request->country,
            'path'       => $request->path,
            'visitor'    => $request->cookie,
            'user_id'    => Crypt::decryptString($request->route('tracking'))
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'visitor added.'
        ],200);
    }


}