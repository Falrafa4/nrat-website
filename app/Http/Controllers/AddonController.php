<?php

namespace App\Http\Controllers;

use App\Models\Addon;

class AddonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addons = Addon::with('category')
            ->latest('created_at')
            ->get();

        return view('pages.addons', compact('addons'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Addon $addon)
    {
        $addon->load(['category', 'images', 'dependencies']);

        return view('pages.addon-detail', compact('addon'));
    }
}
