<x-app-layout>
    <div class="flex justify-center items-center py-4 px-2">
        <div class="w-full max-w-4xl">
            <h1 class="text-4xl text-slate font-bold eng-deco text-center">Event List</h1>
            <div class="border border-lg my-4 py-4 px-6 flex flex-col justify-center items-center">
                <a href="{{ route('event.register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">新規登録</a>
                <div class="my-4 flex flex-col justify-center items-center gap-6">
                    @foreach($events as $event)
                        <a href="{{ route('event.detail', $event->id) }}" class="bg-white hover:bg-green-200 transition-all duration-300 rounded-lg shadow-lg py-2 px-4 w-full">
                            <div class="flex items-center text-sm">
                                {{ $event->date }}<span class="text-lg ml-6 font-bold">{{ $event->name }}</span>
                            </div>
                            <div class="text-right text-sm mt-2">{{ $event->location }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
