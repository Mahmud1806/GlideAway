<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Trips;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recharge;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $cartItems = Cart::where('user_id', Auth::id())->get();
    $recharge = Recharge::where('user_id', Auth::id())->first();
    $balance = $recharge ? $recharge->balance : 0;

    return view('cart', compact('cartItems', 'balance'));
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
    Cart::create([
        'user_id' => Auth::id(),
        'item_type' => $request->item_type,
        'item_id' => $request->item_id,
        'quantity' => $request->quantity,
        'price' => $request->price,
    ]);

    return redirect()->route('cart')->with('success', 'Trip added to cart!');
}



public function pay($id)
{
    $userId = Auth::id();
    $cartItem = Cart::where('user_id', $userId)->find($id);

    if (!$cartItem) {
        return redirect()->route('cart')->with('success', 'Item not found in cart.');
    }

    $recharge = Recharge::where('user_id', $userId)->first();

   

    if ($recharge && $recharge->price >= $cartItem->price) {
        // Deduct balance
        $recharge->price -= $cartItem->price;
        $recharge->save();

        // Remove item from cart
        $cartItem->delete();

        return redirect()->route('cart')->with('success', 'Your product was successfully purchased!');
    }

    return redirect()->route('cart')->with('Error', 'Please recharge your account.');
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
    public function remove($id)
{
    $item = Cart::where('user_id', Auth::id())->find($id);

    if ($item) {
        $item->delete();
    }

    return redirect()->route('cart')->with('success', 'Item removed from cart!');
}

}
