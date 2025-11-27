<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Package;
use App\Models\Kebaya;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'portfolios' => Portfolio::count(),
            'active_portfolios' => Portfolio::where('is_active', true)->count(),
            'packages' => Package::count(),
            'active_packages' => Package::where('is_active', true)->count(),
            'kebayas' => Kebaya::count(),
            'active_kebayas' => Kebaya::where('is_active', true)->count(),
        ];

        $recent_portfolios = Portfolio::latest()->take(5)->get();
        $recent_kebayas = Kebaya::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_portfolios', 'recent_kebayas'));
    }
}
