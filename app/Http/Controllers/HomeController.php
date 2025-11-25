<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\BlogPost;
use App\Models\Package;
use App\Models\Kebaya;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::active()->ordered()->take(6)->get();
        $blogPosts = BlogPost::published()->ordered()->take(6)->get();
        
        // Get packages from packages table
        $packages = Package::active()->ordered()->get();
        
        // Get kebayas from kebayas table
        $kebayas = Kebaya::active()->ordered()->get();
        
        return view('pages.home', compact('portfolios', 'blogPosts', 'packages', 'kebayas'));
    }
}
