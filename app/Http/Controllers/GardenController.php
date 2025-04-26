<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GardenController extends Controller
{
    public function index()
    {
        $gardens = Garden::where('created_by', Auth::id())->get();
        return view('gardens.index', compact('gardens'));
    }

    public function create()
    {
        return view('gardens.create');
    }

    public function store(Request $request)
    {
        \Log::info('Starting garden creation process', [
            'request_data' => $request->all(),
            'has_file' => $request->hasFile('image'),
            'user_id' => auth()->id(),
            'headers' => $request->headers->all()
        ]);
        
        try {
            \Log::info('Validating request data');
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'size' => 'required|numeric|min:0.01',
                'type' => 'required|string|in:vegetable,flower,herb,mixed,other',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            \Log::info('Validation passed', ['validated_data' => $validatedData]);

            $garden = new Garden();
            $garden->name = $validatedData['name'];
            $garden->description = $validatedData['description'];
            $garden->address = $validatedData['address'];
            $garden->city = $validatedData['city'];
            $garden->state = $validatedData['state'];
            $garden->size = $validatedData['size'];
            $garden->type = $validatedData['type'];
            $garden->status = 'active';
            $garden->created_by = auth()->id();

            \Log::info('Garden object created', ['garden_data' => $garden->toArray()]);

            if ($request->hasFile('image')) {
                \Log::info('Processing image upload', [
                    'file_name' => $request->file('image')->getClientOriginalName(),
                    'file_size' => $request->file('image')->getSize()
                ]);
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage/garden_images'), $imageName);
                $garden->image = 'garden_images/' . $imageName;
                \Log::info('Image stored', ['path' => $garden->image]);
            }

            \Log::info('Attempting to save garden');
            $garden->save();
            \Log::info('Garden saved successfully', ['garden_id' => $garden->id]);

            return redirect()->route('gardens.show', $garden)
                ->with('success', 'Garden created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed', [
                'errors' => $e->errors(),
                'input' => $request->all()
            ]);
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error creating garden', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            return back()->with('error', 'An error occurred while creating the garden. Please try again.')
                ->withInput();
        }
    }

    public function show(Garden $garden)
    {
        return view('gardens.show', compact('garden'));
    }

    public function edit(Garden $garden)
    {
        return view('gardens.edit', compact('garden'));
    }

    public function update(Request $request, Garden $garden)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'size' => 'required|numeric|min:1',
            'type' => 'required|in:vegetable,flower,herb,mixed,other',
            'status' => 'required|in:active,inactive',
        ]);

        $garden->update($validated);

        return redirect()->route('gardens.show', $garden)
            ->with('success', 'Garden updated successfully!');
    }

    public function destroy(Garden $garden)
    {
        $garden->delete();
        return redirect()->route('dashboard')
            ->with('success', 'Community plot deleted successfully!');
    }
} 