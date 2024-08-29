<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow-md">
            <h2 class="font-semibold text-2xl text-pink-800 leading-tight">
                <h1 class="text-2xl font-bold mb-6 text-purple-900">
                    Hello, {{ Auth::user()->name }}.
                </h1>

            </h2>
            <div class="space-x-4">
                <a href="{{ route('appointment.create') }}" class="text-blue-600 hover:text-blue-800">
                    Add Appointment
                </a>
                <a href="{{ route('patient.appointments') }}" class="text-blue-600 hover:text-blue-800">
                    View Appointments
                </a>
            </div>
        </div>
    </x-slot>
     <!-- Notification Dropdown -->
     <div class="hidden sm:flex sm:items-center">
        <x-dropdown align="left" width="50">
            <x-slot name="trigger">
                <button
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                    <div>Notification</div>
                </button>
            </x-slot>

<x-slot name="content">
    <!-- Notifications Section -->
    @if ($notifications->isNotEmpty())
        <div
            class="bg-pink-100 dark:bg-white-900 border border-yellow-300 dark:border-yellow-700 rounded-md p-4 max-h-80 overflow-y-auto w-80">
            <div class="font-semibold">Appointment Rescheduled</div>
            <hr>

            <ul class="mt-2">
                @foreach ($notifications->take(3) as $notification)
                    <li class="mb-2">
                        <p>
                            Your appointment with Dr.
                            {{ $notification->data['doctor_name'] ?? 'Unknown Doctor' }}
                            has been rescheduled to
                            {{ $notification->data['appointment_date_time'] ?? 'Unknown Date' }}
                            {{-- at {{ $notification->data['appointment_time'] ?? 'Unknown Time' }}. --}}
                        </p>
                        <small
                            class="text-gray-500 dark:text-gray-400">{{ $notification->created_at->diffForHumans() }}</small>
                        <hr>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <p class="p-4 text-gray-500 dark:text-gray-400">No new notifications.</p>
    @endif

</x-slot>
        </x-dropdown>
     </div>


        <div class="max-w-6xl mx-auto px-4 lg:px-6">
            <!-- Profile Section -->


            <!-- Appointments Section -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if ($appointments->isEmpty())
                    <p class="text-center text-gray-600 py-6">No upcoming appointments</p>
                @else
                    {{-- <ul class="divide-y divide-gray-200">
                        @foreach ($appointments as $appointment)
                            @php
                                $date = \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y H:i');
                            @endphp
                            <li class="px-6 py-4 hover:bg-gray-100 transition-colors duration-300">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-lg font-semibold text-gray-800 mb-1">
                                            {{ $appointment->description }}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            Date: {{ $date }}
                                        </p>
                                    </div>
                                    <div>
                                        <a href="{{ route('patient.appointments', $appointment->id) }}"
                                            class="text-blue-600 hover:text-blue-800">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach --}}
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <style>
        .image {

    background-size: cover;
    background-position: center;
}
    </style>
</x-app-layout>
