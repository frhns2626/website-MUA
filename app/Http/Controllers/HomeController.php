<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Package;
use App\Models\Kebaya;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::active()->ordered()->take(6)->get();
        
        // Get packages from packages table - separate wedding and wisuda
        $weddingPackages = Package::active()->wedding()->ordered()->get();
        $wisudaPackages = Package::active()->wisuda()->ordered()->get();
        
        // Get kebayas from kebayas table
        $kebayas = Kebaya::active()->ordered()->get();
        
        return view('pages.home', compact('portfolios', 'weddingPackages', 'wisudaPackages', 'kebayas'));
    }
}
