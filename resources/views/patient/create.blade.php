
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <style>
   body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0px;
    padding: 0;
}

.container {
    max-width: 500px;
    background-color: #ffffff;
    padding: 50px;
    margin: 50px auto;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 5px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555555;
}

.form-group input[type="text"],
.form-group input[type="date"],
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #f7f7f7;
}

.form-group select {
    height: 40px;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: #66afe9;
    box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
}

.btn-primary {
    display: block;
    width: 50%;
    padding: 10px;
    background-color: #ff8800;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
    margin:50px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

a {
    display: block;
    text-align: center;
    margin-top: 5px;
    color: #ff8400d0;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.x-input-error {
    color: red;
    font-size: 0.875rem;
    margin-top: 5px;
}

    </style>
</head>

<body>
</div>
    <x-app-layout>
        <div class="container">
            <h2>Patient</h2>
            <div>

        Name : {{ Auth::user()->name }} <br>
        Email: {{ Auth::user()->email }} <br>
        Role: {{ Auth::user()->role }} <br>
    </div>
            <form action="{{ route('patient.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div>
                        <x-input-label for="address" :value="__('Address')" />
                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('doctor_position')" autofocus autocomplete="doctor_position" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <x-input-label for="number" :value="__('Phone Number')" />
                    <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" autofocus autocomplete="number" />
                    <x-input-error :messages="$errors->get('number')" class="mt-2" />
                </div>
                <div class="form-group">
                    <div>
                        <x-input-label for="age" :value="__('Age')" />
                        <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" autofocus autocomplete="age" />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <x-input-label for="birth_date" :value="__('Age')" />
                        <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" :value="old('birth_date')" autofocus autocomplete="birth_date" />
                        <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                    </div>
                </div>
                <div class="form-group">

                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </select>
                </div>


                <div class="form-group">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <form action="{{route('patient.store')}}" method="POST">
                    <button type="submit" class="btn btn-primary">Save Patient</button>
                </form>

                <br>
            </form>
        </div>
    </x-app-layout>
</body>

</html>
