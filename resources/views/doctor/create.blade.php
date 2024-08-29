<x-app-layout >
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
    <style>
        .container {
            max-width: 450px;
            margin: 0 auto;
            padding:10px;
            background-image: url('/images/Doctor.jpg');
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #ff8000;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            margin:5px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
        .names{
            text-align: center;
            font-size: 0.6cm;
            color:rgb(25, 75, 44);
        }
    </style>
</head>
<body>
        <div class="container">
            <div class="form-group">
                <div class="names">
        Name : {{ Auth::user()->name }} <br>
        Email: {{ Auth::user()->email }} <br>
        Role: {{ Auth::user()->role }} <br>
                </div>
            <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                   <div>
                        <x-input-label for="name" :value="__('Position')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="position" :value="old('position')" autofocus autocomplete="position" />
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <x-input-label for="gender"  :value="__('Gender')" />
                        <select id="gender" name="gender" class="form-control">
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="others" {{ old('gender') == 'others' ? 'selected' : '' }}>Other</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                    </div>

                <div class="form-group">

                    <x-input-label for="department_id">Department</x-input-label>
                    <select id="department_id" name="department_id" class="form-control">
                        @foreach ($departments as $department)
            <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-input-label for="shift" :value="__('Shift')" />
                    <x-text-input id="shift" class="block mt-1 w-full" type="text" name="shift" :value="old('shift')" autofocus autocomplete="shift" />
                    <x-input-error :messages="$errors->get('shift')" class="mt-2" />
                            </div>
                <div class="form-group">

                    <x-input-label for="image">Image</x-input-label>
                    <input type="file" id="image" name="image" class="form-control">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <div class="form-group">
                    <x-input-label for="name" :value="__('Experience')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="experience" :value="old('experience')" autofocus autocomplete="experience" />
                    <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                </div>
                <div class="form-group">
                    <x-input-label for="name" :value="__('Phone Number')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" autofocus autocomplete="phone_number" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                </div>

                <form action="{{route('doctor.store')}}" method="POST">
                    <button type="submit" class="btn btn-primary">Save Doctor</button>
                </form>
                        </form>
        </div>


</body>

</html>
</x-app-layout>
