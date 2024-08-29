<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Schedules</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                margin: 0;
                padding: 0;
                background-image: url('/images/Doctor.jpg');


            }

            h1, h2 {
                color: #333;
            }

            .container {

                width: 50%;
                margin: 0 auto;
                padding: 20px;

                background: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-top: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table, th, td {
                border: 1px solid #ddd;
            }

            th, td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #ee9f9f;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .form-group {
                margin-bottom: 15px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #555;
            }

            input[type="datetime-local"] {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            button {
                background-color: #ff8000;
                color: white;
                border: none;
                padding: 10px 15px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover {
                background-color: #e67000;
            }

            .btn-primary {
                display: inline-block;
                padding: 10px 15px;
                background-color: #b35400;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                text-align: center;
                font-size: 16px;
                margin-top: 20px;
            }

            .btn-primary:hover {
                background-color: #003d7a;
            }

            .success-message {
                color: green;
                margin-bottom: 20px;
            }

            .error-message {
                color: red;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>
        <div class="container">

            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <h1 style="color:green">Your Schedules</h1>
            <table>
                <thead>
                    <tr>
                        <th>Available From</th>
                        <th>Available To</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->available_from }}</td>
                            <td>{{ $schedule->available_to }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No schedules found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <h2>Add New Schedule</h2>
            <form action="{{ route('doctor.storeSchedule') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="available_from">Available From</label>
                    <input type="datetime-local" id="available_from" name="available_from">
                </div>
                <div class="form-group">
                    <label for="available_to">Available To</label>
                    <input type="datetime-local" id="available_to" name="available_to">
                </div>
                <button type="submit">Add Schedule</button>
            </form>

            <a href="{{ route('doctor.dashboard') }}" class="btn-primary">Back to Dashboard</a>
        </div>
    </body>

    </html>
    </x-app-layout>
