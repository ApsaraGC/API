<x-app-layout>
    <div class="container">
        <h1 class="page-title">Your Appointments</h1>

        @if($appointments->isEmpty())
            <p class="no-appointments">You have no appointments.</p>
        @else
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td >{{ $appointment->date_time }}</td>
                            <td>{{ $appointment->patient->user->name }}</td>
                            <td>{{ $appointment->doctor->user->name }}</td>
                            <td>{{ $appointment->department->name }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                <form action="{{ route('patient.appointment.destory', $appointment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                                                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Back to Dashboard Button -->
        <a href="{{ route('patient.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
    </div>

    <style>
        .page-title {
            color: purple;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .no-appointments {
            font-size: 18px;
            color: gray;
        }

        .appointments-table {
            width: 100%;
            background-color: #f4f4f4;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .appointments-table th, .appointments-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .appointments-table th {
            background-color: #f4f4f4;
            color: #333;
        }

        .appointments-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .appointments-table tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background-color: #ff7700;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</x-app-layout>
