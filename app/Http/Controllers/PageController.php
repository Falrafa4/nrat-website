<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        $latestAddons = Addon::latest()->take(2)->get();
        return view('pages.landing', compact('latestAddons'));
    }

    public function myContent()
    {
        return view('pages.my-content');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function about()
    {
        return view('pages.about');
    }
}
