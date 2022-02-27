<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\CarbonPeriod;


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
        $uniqueVisit = DB::table('visitors')
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();
        $visit          =  Visitor::where('user_id', '=', Auth::user()->id)->count();
        //Nb Visits per browser
        //chrome
        $visitByChrome  =  Visitor::query()
            ->where('browser', '=', 'chrome')
            ->where('user_id', '=', Auth::user()->id)
            ->count();
        //safari
        $visitBySafari  =  Visitor::query()
            ->where('browser', '=', 'safari')
            ->where('user_id', '=', Auth::user()->id)
            ->count();
        //firefox
        $visitByFireFox  =  Visitor::query()
            ->where('browser', '=', 'firefox')
            ->where('user_id', '=', Auth::user()->id)
            ->count();
        //opera
        $visitByOpera  =  Visitor::query()
            ->where('browser', '=', 'opera')
            ->where('user_id', '=', Auth::user()->id)
            ->count();
        //edge
        $visitByEdge  =  Visitor::query()
            ->where('browser', '=', 'edge')
            ->where('user_id', '=', Auth::user()->id)
            ->count();

        $uniqueVisitByChrome =  Visitor::query()
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('browser', '=', 'chrome')
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();

        $uniqueVisitBySafari =  Visitor::query()
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('browser', '=', 'safari')
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();

        $uniqueVisitByFirefox =  Visitor::query()
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('browser', '=', 'firefox')
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();

        $uniqueVisitByOpera =  Visitor::query()
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('browser', '=', 'opera')
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();

        $uniqueVisitByEdge =  Visitor::query()
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('browser', '=', 'edge')
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();

        //Nb Visits + Nb unique visits by device type (Desktop/Tablet/Smartphone)
        $visitByPhone   =  Visitor::query()
            ->where('device', '=', 'mobile')
            ->where('user_id', '=', Auth::user()->id)
            ->count();
        $visitByTablet  =  Visitor::query()
            ->where('device', '=', 'tablet')
            ->where('user_id', '=', Auth::user()->id)
            ->count();
        $visitByDesktop =  Visitor::query()
            ->where('device', '=', 'desktop')
            ->where('user_id', '=', Auth::user()->id)
            ->count();
        $uniqueVisitByPhone =  Visitor::query()
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('device', '=', 'mobile')
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();
        $uniqueVisitByTablet =  Visitor::query()
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('device', '=', 'tablet')
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();
        $uniqueVisitByDesktop =  Visitor::query()
            ->select(DB::raw('count(visitor) as visitor_count'))
            ->where('device', '=', 'desktop')
            ->where('user_id', '=', Auth::user()->id)
            ->groupBy('visitor')
            ->get();

        //last chart
        $now            = Carbon::now();
        $weekStartDate  = $now->subDays(7)->format('M d');
        $weekEndDate    = Carbon::now()->format('M d');
        $period         = CarbonPeriod::create($weekStartDate, $weekEndDate);
        $countVisit = [];
        $countUniqueVisit = [];
        foreach ($period as $date) {
            $datesLabel[]  = $date->format('M d');
            /** 1B push array count male and female**/
            $visits = Visitor::query()->where('user_id', '=', Auth::user()->id)
                ->whereDate('created_at', '=', $date->format('y-m-d'))
                ->count();
            $countVisit[] = $visits === 0 ? '' : $visits ;
            $uniqueVisits = DB::table('visitors')
                ->select(DB::raw('count(visitor) as visitor_count'))
                ->where('user_id', '=', Auth::user()->id)
                ->whereDate('created_at', '=', $date->format('y-m-d'))
                ->groupBy('visitor')
                ->get();
            $countUniqueVisit[] = $uniqueVisits->count() === 0 ? '' : $uniqueVisits->count();
        }
        return view('home',[
            'visit'                      => $visit,
            'uniqueVisit'                => $uniqueVisit->count(),
            'labelDate'                  => $datesLabel,
            'visitByDays'                => $countVisit,
            'uniqueVisitByDays'          => $countUniqueVisit,
            'visitByChrome'              => $visitByChrome,
            'uniqueVisitByChrome'        => $uniqueVisitByChrome->count(),
            'visitBySafari'              => $visitBySafari,
            'uniqueVisitBySafari'        => $uniqueVisitBySafari->count(),
            'visitByFireFox'             => $visitByFireFox,
            'uniqueVisitByFirefox'       => $uniqueVisitByFirefox->count(),
            'visitByOpera'               => $visitByOpera,
            'uniqueVisitByOpera'         => $uniqueVisitByOpera->count(),
            'visitByEdge'                => $visitByEdge,
            'uniqueVisitByEdge'          => $uniqueVisitByEdge->count(),
            'visitByPhone'               => $visitByPhone,
            'visitByTablet'              => $visitByTablet,
            'visitByDesktop'             => $visitByDesktop,
            'uniqueVisitByPhone'         => $uniqueVisitByPhone->count(),
            'uniqueVisitByTablet'        => $uniqueVisitByTablet->count(),
            'uniqueVisitByDesktop'       => $uniqueVisitByDesktop->count(),
        ]);
    }
}
