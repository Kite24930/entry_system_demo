<x-app-layout>
    <div class="flex justify-center items-center py-4 px-2">
        <div class="w-full max-w-xl">
            <h1 class="text-4xl text-slate font-bold eng-deco text-center">Event List</h1>
            @if (session('msg'))
                <div class="text-center text-green-500 font-bold">{{ session('msg') }}</div>
            @endif
            <div class="border border-lg my-4 py-4 px-6 flex flex-col justify-center items-center bg-white rounded-lg">
                <h2 class="text-2xl text-slate font-bold eng-deco text-center">参加申し込み済みイベント</h2>
                <div class="my-4 flex flex-col justify-center items-center gap-6 w-full">
                    @foreach($applied_events as $event)
                        <a href="{{ route('admission') }}" class="bg-white hover:bg-green-200 transition-all duration-300 rounded-lg shadow-lg py-2 px-4 w-full">
                            <div class="flex items-center text-sm">
                                {{ $event->date }}<span class="text-lg ml-6 font-bold">{{ $event->name }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
            <div class="border border-lg my-4 py-4 px-6 flex flex-col justify-center items-center bg-white rounded-lg">
                <h2 class="text-2xl text-slate font-bold eng-deco text-center">未申し込みイベント</h2>
                <div class="my-4 flex flex-col justify-center items-center gap-6 w-full">
                    @foreach($not_applied_events as $event)
                        <a href="{{ route('registration', ['event_id' => $event->id]) }}" class="bg-white hover:bg-green-200 transition-all duration-300 rounded-lg shadow-lg py-2 px-4 w-full">
                            <div class="flex items-center text-sm">
                                {{ $event->date }}<span class="text-lg ml-6 font-bold">{{ $event->name }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
