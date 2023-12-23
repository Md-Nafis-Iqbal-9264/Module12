
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Available Seats</h2>
        
        <!-- Your form to select a date -->
        <form action="{{ route('tickets.index') }}" method="get">
            @csrf
            <label for="date">Select Date:</label>
            <input type="date" name="date" required>
            <button type="submit">View Seats</button>
        </form>

        <!-- Display available seats if selected date is provided -->
        @if(isset($availableSeats))
            <h3>Available Seats on {{ $selectedDate }}</h3>
            <ul>
                @foreach($availableSeats as $seat)
                    <li>{{ $seat }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection    