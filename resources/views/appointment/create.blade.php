<x-app-layout>

    <form method="POST" action="{{ route('appointment.doctor') }}">
        @csrf

        <!-- Department -->
        <div class="mt-4">
            <x-input-label for="department_id" :value="__('Department')" />
            <select id="department_id" name="department_id" class="block mt-1 w-full">
                <option value="" {{ old('department_id') ? 'selected' : '' }}>Select a Department</option>
                @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                Find Doctor
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
