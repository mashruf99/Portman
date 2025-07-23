<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Show public portfolios + user's own
        $portfolios = Portfolio::where('is_public', true)
            ->orWhere('user_id', Auth::id())
            ->latest()->get();
        return view('portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_public' => 'boolean',
        ]);

        Auth::user()->portfolios()->create($request->only('title', 'description', 'is_public'));

        return redirect()->route('portfolios.index')->with('success', 'Portfolio created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        // Only show if public or owner
        if ($portfolio->is_public || $portfolio->user_id == Auth::id()) {
            return view('portfolios.show', compact('portfolio'));
        }
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        // Only owner can edit
        if ($portfolio->user_id != Auth::id()) {
            abort(403);
        }
        return view('portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        if ($portfolio->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_public' => 'boolean',
        ]);

        $portfolio->update($request->only('title', 'description', 'is_public'));

        return redirect()->route('portfolios.index')->with('success', 'Portfolio updated!');
    }

    
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->user_id != Auth::id()) {
            abort(403);
        }
        $portfolio->delete();
        return redirect()->route('portfolios.index')->with('success', 'Portfolio deleted!');
    }
}
