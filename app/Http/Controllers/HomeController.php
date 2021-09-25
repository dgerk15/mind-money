<?php

namespace App\Http\Controllers;

use App\Models\FinancialRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $finances = [];

        if (Auth::check()) {
            $start_at = isset($request->start_at) ? Carbon::create($request->start_at) : Carbon::now()->startOfMonth();
            $end_at = isset($request->end_at) ? Carbon::create($request->end_at) : Carbon::now()->endOfMonth();

            $finances = FinancialRecord::where('user_id', Auth::user()->id)
                ->whereBetween('created_at', [$start_at, $end_at])
                ->get();
        }

        return view('home', compact('finances'));
    }
}
