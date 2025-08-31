<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recharge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        'price' => 'required|numeric|min:0',
    ]);

    $userId = Auth::id();

    $recharge = Recharge::where('user_id', $userId)->first();

    if ($recharge) {
        $recharge->price = $recharge->price + $validated['price'];
        $recharge->save(); // 🔥 This is the key line
    } else {
        Recharge::create([
            'user_id' => $userId,
            'price' => $validated['price'],
        ]);
    }

    return redirect()->route('dashboard')->with('success', 'Recharge successful!');
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
    public function destroy(string $id)
    {
        //
    }
}
