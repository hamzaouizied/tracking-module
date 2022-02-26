<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TrackingRepository;


class TrackingController extends Controller
{
    private $trackingRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TrackingRepository $trackingRepository)
    {
        $this->middleware('auth')->except('getDataFromLink');
        $this->trackingRepository = $trackingRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|mixed
     */
    public function index()
    {
        return $this->trackingRepository->showTrackingLink();
    }

    /**
     * @return mixed
     */
    public function getDataFromLink(Request $request)
    {
        return $this->trackingRepository->getDataFromLink($request);
    }
}
