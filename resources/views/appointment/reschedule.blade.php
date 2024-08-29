<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                Schedule New Appointment
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-pink-200 dark:bg-lightblue-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-800">

                    <!-- Appointment Form -->
                    <form action="{{ route('appointment.rescheduleStore', $appointment->id) }}" method="POST" class="mt-6">


                        @csrf
                        @method('PATCH')
                        <!-- Date -->
                        <div class="mt-4">
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="datetime-local" name="date"
                                min="{{ now()->format('Y-m-d') }}" :value="old('date', \Illuminate\Support\Str::substr($appointment->date, 0, 10))" onchange="updateDay()" />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <!-- Display Selected Day -->
                        <div class="mt-4">
                            <p id="selected-day" class="font-medium text-gray-900 dark:text-gray-100">
                                <!-- The selected day will be shown here -->
                            </p>
                        </div>


                        <!-- Re-schedule Appointment Button -->
                        <div class="flex items-center justify-end">
                            <button id="book-appointment-btn"
                                class="ms-4 mt-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Re-schedule Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

