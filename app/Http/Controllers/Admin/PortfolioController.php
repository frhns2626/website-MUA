<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::ordered()->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolios', 'public');
        }

        // Auto-generate order if not provided or if order already exists
        if (!isset($validated['order']) || $validated['order'] === null || $validated['order'] === '') {
            $maxOrder = Portfolio::max('order') ?? -1;
            $validated['order'] = $maxOrder + 1;
        } else {
            // Check if order already exists, if yes, increment existing orders
            $existingPortfolio = Portfolio::where('order', $validated['order'])->first();
            if ($existingPortfolio) {
                // Increment all portfolios with order >= new order
                Portfolio::where('order', '>=', $validated['order'])->increment('order');
            }
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolios', 'public');
        }

        // Handle order update to prevent duplicates
        if (isset($validated['order']) && $validated['order'] !== null && $validated['order'] !== '') {
            $oldOrder = $portfolio->order;
            $newOrder = $validated['order'];

            if ($oldOrder != $newOrder) {
                // Check if new order already exists (excluding current portfolio)
                $existingPortfolio = Portfolio::where('order', $newOrder)
                    ->where('id', '!=', $portfolio->id)
                    ->first();

                if ($existingPortfolio) {
                    // If moving to lower order, increment orders in between
                    if ($newOrder < $oldOrder) {
                        Portfolio::where('order', '>=', $newOrder)
                            ->where('order', '<', $oldOrder)
                            ->where('id', '!=', $portfolio->id)
                            ->increment('order');
                    } else {
                        // If moving to higher order, decrement orders in between
                        Portfolio::where('order', '>', $oldOrder)
                            ->where('order', '<=', $newOrder)
                            ->where('id', '!=', $portfolio->id)
                            ->decrement('order');
                    }
                }
            }
        } else {
            // Auto-generate order if not provided
            $maxOrder = Portfolio::where('id', '!=', $portfolio->id)->max('order') ?? -1;
            $validated['order'] = $maxOrder + 1;
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Get the order of portfolio being deleted
        $deletedOrder = $portfolio->order;

        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        
        $portfolio->delete();

        // Decrement order of all portfolios with order greater than deleted order
        // This fills the gap and ensures sequential ordering (1, 2, 3, 4...)
        Portfolio::where('order', '>', $deletedOrder)->decrement('order');

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil dihapus.');
    }
}
