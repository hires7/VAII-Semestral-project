<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    public function index() {
        $reviews = Review::with('user')->latest()->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create() {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Nemate povolenie');
        }

        return view('reviews.create');
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if (Review::where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'Uzivatel uz hodnotil.');
        }

        Review::create([
            'user_id' => auth()->id(),
            'content' => $validatedData['content'],
            'rating' => $validatedData['rating'],
        ]);

        return redirect()->route('home')->with('success', 'Hodnotenie pridane.');
    }

    public function edit($id) {
        $review = Review::findOrFail($id);

        if ($review->user_id !== auth()->id()) {
            abort(403, 'Nemáte oprávnenie na úpravu tejto recenzie.');
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::findOrFail($id);

    
        if ($review->user_id !== auth()->id()) {
            abort(403, 'Nemáte oprávnenie na úpravu tejto recenzie.');
        }

        $review->update($validatedData);

        return redirect()->route('reviews.index')->with('success', 'Recenzia bola upravená.');
    }


    public function destroy($id) {
        $review = Review::findOrFail($id);
        if ($review->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403, 'Nemáte oprávnenie na vymazanie tejto recenzie.');
        }

        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Recenzia bola vymazaná.');
    }



}
