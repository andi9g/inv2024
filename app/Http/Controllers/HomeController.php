<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\itemM;
use App\Models\itemhabisM;
use App\Models\itemexpiredM;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $item = itemM::count();
        $itemhabis = itemhabisM::count();
        $itemexpired = itemexpiredM::count();

        return view('pages.home', [
            "item" => $item,
            "itemhabis" => $itemhabis,
            "itemexpired" => $itemexpired,
        ]);
    }
}
