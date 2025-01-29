<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
            @if(auth()->id() == 1)
                <a href="{{ route('event.list') }}" class="bg-white hover:bg-red-50 shadow-sm rounded-lg px-4 py-2 text-xl text-slate font-bold eng-deco duration-300 transition-all">
                    Event List
                </a>
            @else
                <a href="{{ route('entry') }}" class="bg-white hover:bg-red-50 shadow-sm rounded-lg px-4 py-2 text-xl text-slate font-bold eng-deco duration-300 transition-all">
                    Entry
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
