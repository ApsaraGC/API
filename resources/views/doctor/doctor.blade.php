<x-app-layout>
    <style>
        .form-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container .mt-4 {
            margin-top: 1rem;
        }

        .form-container .block {
            display: block;
        }

        .form-container .w-full {
            width: 100%;
        }

        .form-container .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ff8800;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
        }

        .form-container .btn-primary:hover {
            background-color: #e67e22;
        }

        .form-container .x-primary-button {
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            margin-top: 10px;
        }

        .form-container .x-primary-button:hover {
            background-color: #003d7a;
        }

        .form-container .x-input-error {
            color: #e3342f;
            font-size: 0.875rem;
        }

        .form-container .x-input-label {
            font-size: 1rem;
            color: #333;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-container .x-text-input {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            font-size: 1rem;
        }

        .form-container .flex {
            display: flex;
        }

        .form-container .items-center {
            align-items: center;
        }

        .form-container .justify-end {
            justify-content: flex-end;
        }

        .form-container .ms-4 {
            margin-left: 1rem;
        }

        .form-container br {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
    </style>

    <div class="form-container">
        <form method="POST" action="{{ route('appointment.store') }}">
            <input type="hidden" name="department_id" value="{{ $department_id }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="doctor_id" :value="__('Doctor')" />
                <select id="doctor_id" name="doctor_id" class="block mt-1 w-full">
                    <option value="" {{ old('doctor_id') ? 'selected' : '' }}>Select a Doctor</option>
                    @foreach ($department_doctors as $doctor)
                        <option value="{{ $doctor->id }}"
                            {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->user->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('doctor_id')" class="mt-2" />
            </div>

            <!-- Status -->
            <div class="mt-4">
                <x-input-label for="status" :value="__('Status')" />
                <select id="status" name="status" class="block mt-1 w-full">
                    <option value="open">Open</option>
                    <option value="close">Close</option>
                    <option value="pending">Pending</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <!-- Date -->
            <div class="mt-4">
                <x-input-label for="date_time" :value="__('Date')" />
                <x-text-input id="date_time" class="block mt-1 w-full" type="datetime-local" name="date_time"
                    :value="old('date_time')" />
                <x-input-error :messages="$errors->get('date_time')" class="mt-2" />
            </div>

            <br>
            <button>
                <h1>Before booking, please check the doctor schedule</h1>
                <a href="{{ route('patient.schedules') }}" class="btn-primary">Schedule Time</a>
            </button>

            <br>
            <br>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    Schedule Appointment
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
