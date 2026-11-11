<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    // Shared validation rules: price must be numeric and not negative
    private function rules(): array
    {
        return [
            'name'         => 'required|string|max:255',
            'category'     => 'required|in:ornamental,flowering,succulent,herb',
            'unit_price'   => 'required|numeric|min:0',
            'description'  => 'required|string',
            'stock_status' => 'required|in:in_stock,out_of_stock',
        ];
    }

    // List all plants (newest first, 10 per page)
    public function index()
    {
        $plants = Plant::with('user')->latest()->paginate(10);
        return view('plants.index', compact('plants'));
    }

    // Show the add form
    public function create()
    {
        return view('plants.create');
    }

    // Validate and save a new plant
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        // Link the plant to the logged-in user via user_id
        $request->user()->plants()->create($data);

        return redirect()->route('plants.index')->with('success', 'Plant added.');
    }

    // Show one plant
    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    // Show the edit form
    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    // Validate and update a plant
    public function update(Request $request, Plant $plant)
    {
        $plant->update($request->validate($this->rules()));

        return redirect()->route('plants.index')->with('success', 'Plant updated.');
    }

    // Delete a plant
    public function destroy(Plant $plant)
    {
        $plant->delete();

        return redirect()->route('plants.index')->with('success', 'Plant deleted.');
    }
}