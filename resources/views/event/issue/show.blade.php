<x-app-layout>
    <div class="flex justify-center items-center py-4 px-2">
        <div class="w-full max-w-xl">
            <h1 class="text-4xl text-slate font-bold eng-deco text-center">
                {{ $event->name }}
                <br>
                入場QRコード
            </h1>
            <div class="border border-lg my-4 py-4 px-6 flex flex-col justify-center items-center bg-white rounded-lg">
                <div class="w-full mx-4 flex flex-col justify-center items-center gap-6">
                    <img src="{{ $qr_code }}" alt="{{ $event->name }}" class="rounded-lg">
                </div>
            </div>
            <div class="border border-lg my-4 py-4 px-6 flex flex-col justify-center items-center bg-white rounded-lg">
                <div class="w-full mx-4 flex flex-col justify-center items-start gap-6">
                    <div>
                        <x-input-label for="name" :value="__('Event Date')" class="text-sm" />
                        <div class="font-bold text-lg pl-2 flex items-center">{{ $event->date }} <span class="ml-4 text-base">{{ date('G:i', strtotime($event->start_time)) . ' 〜 ' . date('G:i', strtotime($event->end_time)) }}</span></div>
                    </div>
                    <div>
                        <x-input-label for="location" :value="__('Event Location')" class="text-sm" />
                        <div class="font-bold text-lg pl-2">{{ $event->location }}</div>
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Event Description')" class="text-sm" />
                        <div class="font-bold text-lg pl-2">{{ $event->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

