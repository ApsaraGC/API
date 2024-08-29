<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Schedules</title>
</head>

<body>

    <h1>Available Schedules</h1>

    <table border="1">
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
                    <td>{{ $schedule->doctor->name }}</td>
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

    <a href="{{ route('schedules.index') }}">View All Schedules</a>
</body>

</html>
