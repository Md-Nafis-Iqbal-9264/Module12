<!-- resources/views/purchase_tickets.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Purchase Tickets</h2>
        
        <!-- Your form to purchase a ticket -->
        <form action="{{ route('tickets.purchase') }}" method="post">
            @csrf
            <label for="date">Select Date:</label>
            <input type="date" name="date" value="{{ $selectedDate }}" readonly>

            <label for="seat">Select Seat:</label>
            <select name="seat" required>
                @foreach($availableSeats as $seat)
                    <option value="{{ $seat }}">{{ $seat }}</option>
                @endforeach
            </select>

            <label for="user_name">Your Name:</label>
            <input type="text" name="user_name" required>

            <button type="submit">Purchase Ticket</button>
        </form>
    </div>
@endsection
