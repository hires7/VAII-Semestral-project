<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    public function create() {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('reviews.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        Review::create([
            'user_id' => auth()->id(),
            'content' => $validatedData['content'],
            'rating' => $validatedData['rating'],
        ]);
    
        return redirect()->route('home')->with('success', 'Recenzia bola pridaná.');
    }

}
