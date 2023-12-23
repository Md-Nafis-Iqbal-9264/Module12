<!-- resources/views/trips/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>List of Trips</h2>

        @if($trips->isEmpty())
            <p>No trips available.</p>
        @else
            <ul>
                @foreach($trips as $trip)
                    <li>{{ $trip->date }}</li>
                    <!-- Add other trip details as needed -->
                @endforeach
            </ul>
        @endif
    </div>
@endsection
