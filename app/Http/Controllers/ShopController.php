<?php

namespace App\Http\Controllers;
use App\Models\Shop;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $products = Shop::all(); // or Product::all()
    return view('manageShop', compact('products'));
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
    // Step 1: Validate input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:20480',
    ]);

    // Step 2: Handle image upload
    $imagePath = $request->file('image')->store('products', 'public');

    // Step 3: Save product to database
    Shop::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'image' => $imagePath,
    ]);

    // Step 4: Redirect with success
    return redirect()->route('admin.dashboard')->with('success', 'Product added successfully!');
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
    $product = Shop::find($id);

    if ($product) {
        $product->delete();
    }

    return redirect()->route('manage.shop')->with('success', 'Product deleted!');
}

public function showShop()
{
    $products = Shop::all();
    return view('shop', compact('products'));
}


}
