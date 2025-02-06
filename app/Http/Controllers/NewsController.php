<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    public function index() {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('home', compact('news'));
    }

    public function create() {
        return view('news.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        News::create($validatedData);

        return redirect()->route('home')->with('success', 'Novinka bola pridaná.');
    }

    public function destroy($id) {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('home')->with('success', 'Novinka bola zmazaná.');
    }
}
