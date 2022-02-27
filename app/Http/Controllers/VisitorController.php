<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                ->editColumn('created_at', function ($query) {
                    if (!$query->created_at) return '';
                    $dTime = strtotime($query->created_at);
                    return date("Y-m-d H:i:s", $dTime);
                })
                ->addColumn('action', function ($row) {
                    $btn = ' <button type="button" id="' . $row->id . '"  class="btn btn-sm btn-danger delete">
                                <span class="material-icons">delete</span>
                            </button>';
                    return $btn;
                })
                ->make(true);
        }
        return view('visitors.visitor');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        Visitor::query()->where('id', '=', $request->id)->delete();
        return response()->json([
           'message' => 'successfully deleted.'
        ], 200);
    }
}
