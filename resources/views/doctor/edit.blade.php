<x-app-layout>
<div class="container">
    <h2>Edit Doctor</h2>
    <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="doctor_name" :value="__('Name')" />
            <x-text-input id="doctor_name" class="block mt-1 w-full" type="text" name="doctor_name" :value="old('doctor_name', $doctor->doctor_name)" autofocus autocomplete="doctor_name" />
            <x-input-error :messages="$errors->get('doctor_name')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="doctor_position" :value="__('Position')" />
            <x-text-input id="doctor_position" class="block mt-1 w-full" type="text" name="doctor_position" :value="old('doctor_position', $doctor->doctor_position)" autofocus autocomplete="doctor_position" />
            <x-input-error :messages="$errors->get('doctor_position')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" class="form-control">
                <option value="Male" {{ $doctor->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $doctor->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Others" {{ $doctor->gender == 'Others' ? 'selected' : '' }}>Others</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="shift" :value="__('Shift')" />
            <x-text-input id="shift" class="block mt-1 w-full" type="text" name="shift" :value="old('shift', $doctor->shift)" autofocus autocomplete="shift" />
            <x-input-error :messages="$errors->get('shift')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="image" :value="__('Image')" />
            <input type="file" id="image" name="image" class="form-control">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
            @if($doctor->image)
                <img src="{{ asset('images_doctor/' . $doctor->image) }}" alt="Doctor Image" height="100px" width="100px">
            @endif
        </div>

        <div class="form-group">
            <x-input-label for="experience" :value="__('Experience')" />
            <x-text-input id="experience" class="block mt-1 w-full" type="number" name="experience" :value="old('experience', $doctor->experience)" autofocus autocomplete="experience" />
            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
        </div>

        <div class="form-group">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number', $doctor->phone_number)" autofocus autocomplete="phone_number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <button type="submit" class="btn btn-primary">Update Doctor</button>
    </form>
    <a href="{{ route('doctor.index') }}" class="btn btn-primary">Back to List</a>
</div>

</x-app-layout>
