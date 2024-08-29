<x-app-layout>
<div class="container">
    <h2>Confirm Deletion</h2>
    <p>Are you sure you want to delete the following doctor?</p>

    <div>
        <p><strong>Name:</strong> {{ $doctor->doctor_name }}</p>
        <p><strong>Position:</strong> {{ $doctor->doctor_position }}</p>
        <p><strong>Gender:</strong> {{ $doctor->gender }}</p>
        <p><strong>Shift:</strong> {{ $doctor->shift }}</p>
        <p><strong>Experience:</strong> {{ $doctor->experience }} years</p>
        <p><strong>Phone Number:</strong> {{ $doctor->phone_number }}</p>
        <img src="{{ asset('images/' . $doctor->image) }}" alt="Doctor Image" height="100px" width="100px">
    </div>

    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirm Deletion</button>
        <a href="{{ route('doctor.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</x-app-layout>
