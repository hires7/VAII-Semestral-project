<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));

    }

    public function create() {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Nemate povolenie');
        }

        return view('services.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create($validatedData);

        return redirect()->route('services.index')->with('success', 'Služba pridaná.');
    }

    public function editServices() {

        $services = Service::all();
        return view('services.editservices', compact('services'));
    }


    public function edit($id) {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Nemate povolenie');
        }

        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('services.index')->with('success', 'Služba upravená.');
    }

    public function search(Request $request) {
        $query = $request->input('query');

        $services = Service::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($services);
    }

    public function refresh() {
        $services = Service::all();
        return response()->json($services);
    }

    public function destroy($id) {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Nemate povolenie');
        }

        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Služba zmazaná.');
    }

}
