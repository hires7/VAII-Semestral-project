<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index() {
        $cars = auth()->user()->cars;
        return view('cars.index', compact('cars'));
    }

    public function create() {
        return view('cars.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255|unique:cars',
            'year' => 'required|integer|min:1950|max:' . date('Y'),
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('cars', 'public');
            $validatedData['photo_path'] = $path;
        }
    
        auth()->user()->cars()->create($validatedData);
    
        return redirect()->route('cars.index')->with('success', 'Auto bolo pridané.');
    }
    

    public function edit(Car $car) {
        if ($car->user_id !== auth()->id()) {
            abort(403, 'Nemáte povolenie upraviť toto auto.');
        }

        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car) {
        if ($car->user_id !== auth()->id()) {
            abort(403, 'Nemáte povolenie upraviť toto auto.');
        }

        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255|unique:cars,license_plate,' . $car->id,
            'year' => 'required|integer|min:1950|max:' . date('Y'),
        ]);

        $car->update($validatedData);

        return redirect()->route('cars.index')->with('success', 'Auto bolo upravené.');
    }

    public function destroy(Car $car) {
        if ($car->user_id !== auth()->id()) {
            abort(403, 'Nemáte povolenie odstrániť toto auto.');
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Auto bolo zmazané.');
    }
}
