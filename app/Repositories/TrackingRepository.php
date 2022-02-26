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
        $link = env('APP_URL').Crypt::encryptString($user);
        return view('tracking.index',[
            'link' => $link
        ]);
    }

    public function getDataFromLink($request)
    {
        Visitor::create([
            'user_agent' => $request->user_agent,
            'ip'         => $request->ip,
            'device'     => $request->device,
            'country'    => $request->country,
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'visitor added.'
        ],200);
    }


}