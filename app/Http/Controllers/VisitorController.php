<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use DataTables;


class VisitorController extends Controller
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
     * @param $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Visitor::where('user_id', '=', Auth::id())->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = ' <button type="button" id="' . $row->id . '"  class="btn btn-sm btn-purple edit">
                                <span class="material-icons">
                                    update
                                </span>
                            </button>';
                    $btn .= ' <button type="button" id="' . $row->id . '"  class="btn btn-sm btn-purple edit">
                                <span class="material-icons">
                                    delete
                                </span>
                            </button>';
                    return $btn;
                })->make(true);
        }
        return view('visitors.visitor');
    }
}
