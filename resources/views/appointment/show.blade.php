<!-- resources/views/appointments/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100 leading-tight">
                {{ __('Appointment Details') }}
            </h2>
            <a href="{{ route('patient.dashboard') }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                Back to Appointments
            </a>
        </div>
    </x-slot>

    <x-flash-message />

    <div class="py-16">
        <div class="max-w-6xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-gray-50 dark:bg-gray-900 shadow-lg rounded-lg overflow-hidden">
                <div class="p-8 text-gray-800 dark:text-gray-200">
                    <h1 class="text-3xl font-bold mb-6">Appointment Details</h1>

                    <div class="mb-6">
                        <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">Doctor Name:</p>
                        <p class="text-gray-600 dark:text-gray-400">Dr. {{ $appointment->doctor->user->name }}</p>
                    </div>
                    <div class="mb-6">
                        <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">Description:</p>
                        <p class="text-gray-600 dark:text-gray-400">{{ $appointment->patient->description }}</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">Date:</p>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($appointment->date)->format('F j, Y') }}</p>
                    </div>

                    <!-- <div class="mb-6">
                        <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">Time:</p>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ \Carbon\Carbon::parse($appointment->time)->format('g:i A') }}</p>
                    </div> -->

                    <div class="mb-6">
                        <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">Notes:</p>
                        <p class="text-gray-600 dark:text-gray-400">{{ $appointment->notes ?? 'No additional notes' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
