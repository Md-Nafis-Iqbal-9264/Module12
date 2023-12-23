<!-- resources/views/create_trip.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create a Trip</h2>
        <form action="{{ route('trips.store') }}" method="post">
            @csrf
            <label for="date">Select Trip Date:</label>
            <input type="date" name="date" required>
            <button type="submit">Create Trip</button>
        </form>
    </div>
@endsection
