<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
{
    public function index()
    {
        $tweets = Tweet::latest()->get()->map(function($item) {
            $item->type = 'tweet';
            return $item;
        });

        $posts = $tweets->sortByDesc('created_at');

        return view('dashboard', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $post = Tweet::create([
            'user_id' => Auth::id(),
            'text' => $request->text,
        ]);

        // Return only the new tweet's HTML
        return view('partials.tweet', ['post' => $post]);
    }


    public function edit(Tweet $tweet) {
        return view('tweets.edit', ['tweet' => $tweet]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'new_text' => 'required|string|max:280',
        ]);

        $tweet = Tweet::findOrFail($id);
        $tweet->text = $request->input('new_text');
        $tweet->save();

        return redirect()->route('dashboard')->with('success', 'Tweet updated successfully.');
    }

    public function destroy($id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->delete();

        return response()->json([]);
    }
}
