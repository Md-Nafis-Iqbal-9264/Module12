<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\SeatAllocation;

class TripController extends Controller
{
    public function index()
    {
        // Fetch all trips from the database
        $trips = Trip::all();

        // Pass trips data to the view
        return view('trips.index', ['trips' => $trips]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|unique:trips', // Assuming you want each trip date to be unique
            // Add more validation rules for other fields if needed
        ], [
            'date.required' => 'The trip date is required.',
            'date.date' => 'Invalid date format.',
            'date.unique' => 'A trip with this date already exists.',
            // Add custom error messages for other rules as needed
        ]);

        Trip::create([
            'date' => $request->input('date'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully!');
    }
    public function purchase(Request $request)
    {
        // Add validation as needed
        $request->validate([
            'date' => 'required|date',
            'seat' => 'required',
            'user_name' => 'required|string|max:255',
        ], [
            'date.required' => 'Please select a date.',
            'date.date' => 'Invalid date format.',
            'seat.required' => 'Please select a seat.',
            'user_name.required' => 'Please enter your name.',
            'user_name.string' => 'Invalid name format.',
            'user_name.max' => 'Name must not exceed 255 characters.',
        ]);

        // Find the trip based on the selected date
        $trip = Trip::where('date', $request->input('date'))->first();

        if (!$trip) {
            return redirect()->route('home')->with('error', 'Trip not found for the selected date.');
        }

        // Add logic to allocate the selected seat for the user with the associated trip_id
        SeatAllocation::create([
            'trip_id' => $trip->id,
            'user_name' => $request->input('user_name'),
            'seat_number' => $request->input('seat'),
        ]);

        return redirect()->route('home')->with('success', 'Ticket purchased successfully!');
    }

}

