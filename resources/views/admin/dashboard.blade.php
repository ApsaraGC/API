<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight inline-block">
                Admin Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1: Total Patients -->
                <x-dashboard-card title="Total Patients" content="{{ $totalPatient }}"
                    route="{{ route('patient.create') }}" />

                <!-- Card 2: Total Doctors -->
                <x-dashboard-card title="Total Doctors" content="{{ $totalDoctor }}"
                    route="{{ route('doctor.index') }}" />

                <!-- Card 3: Total Appointments -->
                <x-dashboard-card title="Total Appointments" content="{{ $totalAppointment }}"
                    route="{{ route('appointment.index') }}" />
            </div>
        </div>
    </div>

    <style>
        /* Header Styling */
        .header {
            background-color: #2569ae;
            padding: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        /* Card Styling */
        .grid > div {
            background-color: #8ce7a7;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(212, 227, 240, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .grid > div:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 10px rgba(105, 84, 84, 0.15);
        }

        /* Text Colors */
        .title {
            color: #1d56b9;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .content {
            color: #365b9b;
            font-size: 1.5rem;
            font-weight: 700;
        }
    </style>
</x-app-layout>
