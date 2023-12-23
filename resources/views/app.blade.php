<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiki Ticketing System</title>
    <!-- Add your stylesheets, scripts, or any other head content here -->
    <style>
        
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            overflow: hidden;
        }

        h1 {
            margin: 0;
            float: left;
        }

        nav {
            float: right;
            margin-top: 15px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline;
            margin-left: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Tiki Ticketing System</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('trips.create') }}">Create a Trip</a></li>
                    <li><a href="{{ route('tickets.index') }}">View Available Seats</a></li>
                    <!-- Add more navigation links as needed -->
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Tiki Ticketing System. All rights reserved.</p>
            <!-- Add additional footer content or links here -->
        </div>
    </footer>
</body>
</html>
