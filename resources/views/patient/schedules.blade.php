<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Schedules</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1, h2 {
            color: #333;
            margin-top: 0;
        }

        .container {
            width: 80%;
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
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #b35100;
            color: white;
        }

        .btn-primary:hover {
            background-color: #003d7a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Available Schedules</h1>

        <h2>Available Slots</h2>
        <table>
            <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Available From</th>
                    <th>Available To</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->doctor->user->name }}</td>
                        <td>{{ $schedule->available_from }}</td>
                        <td>{{ $schedule->available_to }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No available schedules</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- <a href="{{ route('appointment.doctor') }}" class="btn btn-primary">Back to Form</a> --}}
        <a href="{{ route('appointment.create') }}" class="btn btn-primary">Back to Department</a>

    </div>
</body>

</html>
