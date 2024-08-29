<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Appointments</title>
</head>
<body>

    <h1>Your Appointments</h1>

    @if (session('success'))
        <div style="color:green">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Date & Time</th>
                <th>Time</th>
                <th>Doctor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->status }}</td> <!-- Example status -->
                </tr>
            @empty
                <tr>
                    <td colspan="4">You have no appointments</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
