<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            display: block;
            margin: 0 auto;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 15px;
            background-color: #ff8000;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <h1>Available Doctor</h1>

    <!-- Display success message -->
    @if (session('success'))
        <div style="color:green">
            {{ session('success') }}
        </div>
    @endif

    <br><br>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Gender</th>
                <th>Shift</th>
                <th>Image</th>
                <th>Experience</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->user->name }}</td>
                    <td>{{ $doctor->position }}</td>
                    <td>{{ $doctor->gender }}</td>
                    <td>{{ $doctor->shift }}</td>
                    <td><img src="images/{{ $doctor->image }}" alt="Doctor Image" height="50px" width="50px"></td>
                    <td>{{ $doctor->experience }}</td>
                    <td>{{ $doctor->phone_number }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No doctor found</td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div style="margin-top:20px;">
        {{ $doctors->links() }}
    </div>
    <br>
    <a href="{{ route('doctor.create') }}" class="btn-primary">Add New Doctor</a>
    <br>
    <br>
    <a href="{{ route('doctor.dashboard') }}" class="btn-primary">Back to Dashboard</a>

</body>

</html>
