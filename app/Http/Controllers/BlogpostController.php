<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BlogpostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $blogposts = Blogpost::with('user')->latest()->get(); // eager load user
    return view('blogposts', compact('blogposts'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'country' => 'required|string',
        'description' => 'required|string',
        'duration' => 'required|string',
        'rating' => 'required|integer',
        'image' => 'required|image|max:20480',
    ]);

    $imagePath = $request->file('image')->store('blogposts', 'public');

    Blogpost::create([
        'title' => $validated['title'],
        'country' => $validated['country'],
        'description' => $validated['description'],
        'duration' => $validated['duration'],
        'rating' => $validated['rating'],
        'image' => $imagePath,
        'user_id' => Auth::id(), // ✅ associate blogpost with logged-in user
    ]);

    return redirect()->route('blogposts')->with('success', 'Blog post created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $blogpost = Blogpost::find($id);

    if ($blogpost) {
        $blogpost->delete();
    }

    return redirect()->route('manage.blogposts')->with('success', 'Blogpost deleted successfully!');
}


    public function manage()
{
    $blogposts = Blogpost::all();
    return view('manageBlogPost', compact('blogposts'));
}
}
