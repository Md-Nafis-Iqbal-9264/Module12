<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\SeatAllocation;
use App\Models\Seat;

class TicketController extends Controller
{
    public function index()
    {
        // You may need to fetch available seats data here
        $availableSeats = Seat::where('status', 'available')->get();

        // Pass data to the view
        return view('display_seats', [
            'availableSeats' => $availableSeats,
        ]);
    }

    public function purchase(Request $request)
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
