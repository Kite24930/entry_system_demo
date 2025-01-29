<x-app-layout>
    <div class="flex justify-center items-center py-4 px-2">
        <div class="w-full max-w-xl">
            <h1 class="text-4xl text-slate font-bold eng-deco text-center">Event Register</h1>
            <div class="border border-lg my-4 py-4 px-6 flex flex-col justify-center items-center">
                <form action="{{ route('event.register.store') }}" method="POST" class="w-full mx-4 flex flex-col justify-center items-start gap-6">
                    @csrf

                    <!-- Event Name -->
                    <div class="w-full max-w-xl">
                        <x-input-label for="name" :value="__('Event Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Event Date -->
                    <div class="w-full max-w-md">
                        <x-input-label for="date" :value="__('Event Date')" />
                        <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>

                    <!-- Event Start Time -->
                    <div class="w-full max-w-md">
                        <x-input-label :value="__('Event Time')" />
                        <div class="flex items-center gap-4">
                            <x-text-input id="start_time" class="block mt-1 w-40 text-center" type="time" name="start_time" :value="old('start_time')" required />
                            〜
                            <x-text-input id="end_time" class="block mt-1 w-40" type="time" name="end_time" :value="old('end_time')" required />
                        </div>
                        <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                    </div>

                    <!-- Event Location -->
                    <div class="w-full max-w-xl">
                        <x-input-label for="location" :value="__('Event Location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <!-- Event Description -->
                    <div class="w-full max-w-xl">
                        <x-input-label for="description" :value="__('Event Description')" />
                        <textarea id="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" name="description" required>{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="w-full flex items-center justify-center my-4">
                        <x-primary-button class="ms-3">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
