<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kebaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KebayaController extends Controller
{
    public function index()
    {
        $kebayas = Kebaya::ordered()->get();
        return view('admin.kebayas.index', compact('kebayas'));
    }

    public function create()
    {
        return view('admin.kebayas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('kebayas', 'public');
        }

        // Auto-generate order if not provided or if order already exists
        if (!isset($validated['order']) || $validated['order'] === null || $validated['order'] === '') {
            $maxOrder = Kebaya::max('order') ?? -1;
            $validated['order'] = $maxOrder + 1;
        } else {
            // Check if order already exists, if yes, increment existing orders
            $existingKebaya = Kebaya::where('order', $validated['order'])->first();
            if ($existingKebaya) {
                // Increment all kebayas with order >= new order
                Kebaya::where('order', '>=', $validated['order'])->increment('order');
            }
        }

        Kebaya::create($validated);

        return redirect()->route('admin.kebayas.index')
            ->with('success', 'Kebaya berhasil ditambahkan.');
    }

    public function edit(Kebaya $kebaya)
    {
        return view('admin.kebayas.edit', compact('kebaya'));
    }

    public function update(Request $request, Kebaya $kebaya)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($kebaya->image) {
                Storage::disk('public')->delete($kebaya->image);
            }
            $validated['image'] = $request->file('image')->store('kebayas', 'public');
        }

        // Handle order update to prevent duplicates
        if (isset($validated['order']) && $validated['order'] !== null && $validated['order'] !== '') {
            $oldOrder = $kebaya->order;
            $newOrder = $validated['order'];

            if ($oldOrder != $newOrder) {
                // Check if new order already exists (excluding current kebaya)
                $existingKebaya = Kebaya::where('order', $newOrder)
                    ->where('id', '!=', $kebaya->id)
                    ->first();

                if ($existingKebaya) {
                    // If moving to lower order, increment orders in between
                    if ($newOrder < $oldOrder) {
                        Kebaya::where('order', '>=', $newOrder)
                            ->where('order', '<', $oldOrder)
                            ->where('id', '!=', $kebaya->id)
                            ->increment('order');
                    } else {
                        // If moving to higher order, decrement orders in between
                        Kebaya::where('order', '>', $oldOrder)
                            ->where('order', '<=', $newOrder)
                            ->where('id', '!=', $kebaya->id)
                            ->decrement('order');
                    }
                }
            }
        } else {
            // Auto-generate order if not provided
            $maxOrder = Kebaya::where('id', '!=', $kebaya->id)->max('order') ?? -1;
            $validated['order'] = $maxOrder + 1;
        }

        $kebaya->update($validated);

        return redirect()->route('admin.kebayas.index')
            ->with('success', 'Kebaya berhasil diperbarui.');
    }

    public function destroy(Kebaya $kebaya)
    {
        // Get the order of kebaya being deleted
        $deletedOrder = $kebaya->order;

        if ($kebaya->image) {
            Storage::disk('public')->delete($kebaya->image);
        }
        
        $kebaya->delete();

        // Decrement order of all kebayas with order greater than deleted order
        Kebaya::where('order', '>', $deletedOrder)->decrement('order');

        return redirect()->route('admin.kebayas.index')
            ->with('success', 'Kebaya berhasil dihapus.');
    }
}
