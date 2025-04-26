<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Garden $garden)
    {
        $resources = Resource::where('garden_id', $garden->id)->get();
        return view('resources.index', compact('resources', 'garden'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Garden $garden)
    {
        return view('resources.create', compact('garden'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Garden $garden)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $resource = Resource::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'quantity' => $validated['quantity'],
            'garden_id' => $garden->id,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('resources.index', $garden)
            ->with('success', 'Resource added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Garden $garden, Resource $resource)
    {
        return view('resources.show', compact('garden', 'resource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Garden $garden, Resource $resource)
    {
        return view('resources.edit', compact('garden', 'resource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Garden $garden, Resource $resource)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $resource->update($validated);

        return redirect()->route('resources.index', $garden)
            ->with('success', 'Resource updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Garden $garden, Resource $resource)
    {
        $resource->delete();
        return redirect()->route('resources.index', $garden)
            ->with('success', 'Resource deleted successfully!');
    }
}
