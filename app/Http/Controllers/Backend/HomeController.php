<?php

namespace App\Http\Controllers\Backend;

use App\Addon;
use App\Category;
use App\Combo;
use App\Food;
use App\Http\Controllers\Controller;
use App\Outlet;
use App\User;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_users_count = User::count();
        $all_categories_count = Category::count();
        $all_foods_count = Food::count();
        $all_addons_count = Addon::count();
        $all_combos_count = Combo::count();
        $all_outlets_count = Outlet::count();

        return view('backend.dashboard', compact('all_users_count', 'all_categories_count', 'all_foods_count', 'all_addons_count', 'all_combos_count', 'all_outlets_count'));
    }
}
