<x-app-layout>
<div class="container">
    <h1>Appointment Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Date: {{ $appointment->date->format('Y-m-d H:i') }}</h5>
            <p class="card-text"><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
            <p class="card-text"><strong>Department:</strong> {{ $appointment->department->name }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $appointment->description }}</p>
            <a href="{{ route('patient.appointments') }}" class="btn btn-primary">Back to Appointments</a>
        </div>
    </div>
</div>
</x-app-layout>
