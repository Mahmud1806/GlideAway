<?php

namespace App\Http\Controllers;

use App\Models\Trips;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('country');

        $trips = Trips::query()
            ->when($search, function ($query, $search) {
                $query->where('country', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('trips', compact('trips'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trips $trips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trips $trips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trips $trips)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trips $trips)
    {
        //
    }
}
