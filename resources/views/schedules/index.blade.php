<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Schedules</title>
</head>

<body>

    <h1>All Schedules</h1>

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
                    <td colspan="3">No schedules found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('schedules.create') }}">Add New Schedule</a>
    <a href="{{ route('schedules.showAvailable') }}">View Available Schedules</a>
</body>

</html>
