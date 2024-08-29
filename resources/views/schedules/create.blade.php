<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Schedule</title>
</head>

<body>

    <h1>Create Schedule</h1>

    @if (session('success'))
        <div style="color:green">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div>
            <label for="doctor_id">Doctor</label>
            <select id="doctor_id" name="doctor_id">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="available_from">Available From</label>
            <input type="datetime-local" id="available_from" name="available_from">
        </div>
        <div>
            <label for="available_to">Available To</label>
            <input type="datetime-local" id="available_to" name="available_to">
        </div>
        <button type="submit">Add Schedule</button>
    </form>

    <a href="{{ route('schedules.index') }}">View All Schedules</a>
</body>

</html>
