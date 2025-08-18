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
    public function manage(Request $request)
    {
        $trips = Trips::all();

        return view('manageTrips', compact('trips'));
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
  // TripController.php
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'country' => 'required|string',
        'description' => 'required|string',
        'hotel' => 'required|string',
        'flight' => 'required|string',
        'duration' => 'required|string',
        'price' => 'required|integer',
        'image' => 'required|image|max:20480',
    ]);

    $imagePath = $request->file('image')->store('trips', 'public');

    Trips::create([
        'title' => $validated['title'],
        'country' => $validated['country'],
        'description' => $validated['description'],
        'hotel' => $validated['hotel'],
        'flight' => $validated['flight'],
        'duration' => $validated['duration'],
        'price' => $validated['price'],
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Trip created successfully!');
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
    public function destroy($country)
{
    $trip = Trips::where('country', $country)->firstOrFail();
    $trip->delete();

    return redirect()->route('manage.trips')->with('success', 'Trip deleted successfully!');
}

public function destroyByCountry($country)
{
    $trip = Trips::where('country', $country)->first();

    if (!$trip) {
        return redirect()->route('manage.trips')->with('error', 'Trip not found for country: ' . $country);
    }

    $trip->delete();

    return redirect()->route('manage.trips')->with('success', 'Trip deleted successfully!');

}
}
