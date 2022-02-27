<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //Total Nb Visits + Nb Unique Visits
        $uniqueVisit    =  Visitor::query()->groupBy('visitor')->count();
        $visit          =  Visitor::count();
        //Nb Visits + Nb unique visits per browser
        $visitByBrowser        =  Visitor::query()->groupBy('user_agent')->count();
        $uniqueVisitByBrowser  =  Visitor::query()->groupBy('user_agent')->groupBy('visitor')
            ->count();
        //Nb Visits + Nb unique visits by device type (Desktop/Tablet/Smartphone)
        $visitByPhone   =  Visitor::query()
            ->where('device', '=', 'mobile')
            ->count();
        $visitByTablet  =  Visitor::query()
            ->where('device', '=', 'tablet')
            ->count();
        $visitByDesktop =  Visitor::query()
            ->where('device', '=', 'desktop')
            ->count();
        $uniqueVisitByPhone =  Visitor::query()
            ->where('device', '=', 'mobile')
            ->groupBy('visitor')
            ->count();
        $uniqueVisitByTablet =  Visitor::query()
            ->where('device', '=', 'tablet')
            ->groupBy('visitor')
            ->count();
        $uniqueVisitByDesktop =  Visitor::query()
            ->where('device', '=', 'desktop')
            ->groupBy('visitor')
            ->count();

        return view('home',[
            'visit'                      => $visit,
            'uniqueVisit'                => $uniqueVisit,
            'visitByBrowser'             => $visitByBrowser,
            'uniqueVisitByBrowser'       => $uniqueVisitByBrowser,
            'visitByPhone'               => $visitByPhone,
            'visitByTablet'              => $visitByTablet,
            'visitByDesktop'             => $visitByDesktop,
            'uniqueVisitByPhone'         => $uniqueVisitByPhone,
            'uniqueVisitByTablet'  => $uniqueVisitByTablet,
            'uniqueVisitByDesktop' => $uniqueVisitByDesktop,
        ]);
    }
}
