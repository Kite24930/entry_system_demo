<x-app-layout>
    <div class="flex justify-center items-center py-4 px-2">
        <div class="w-full max-w-xl">
            <h1 class="text-4xl text-slate font-bold eng-deco text-center">
                入場処理が完了しました。
            </h1>
            <div class="border border-lg my-4 py-4 px-6 flex flex-col justify-center items-center bg-white rounded-lg">
                <div class="w-full mx-4 flex flex-col justify-center items-start gap-6">
                    <!-- Event Name -->
                    <div class="w-full max-w-xl">
                        <x-input-label for="name" :value="__('Event Name')" />
                        <div class="font-bold text-lg pl-2">{{ $event->name }}</div>
                    </div>

                    <!-- Event Date -->
                    <div class="w-full max-w-md">
                        <x-input-label for="date" :value="__('Event Date')" />
                        <div class="font-bold text-lg pl-2">{{ $event->date }}</div>
                    </div>

                    <!-- Event Time -->
                    <div class="w-full max
                    -w-md">
                        <x-input-label :value="__('Event Time')" />
                        <div class="font-bold text-lg pl-2">{{ date('G:i', strtotime($event->start_time)) }} 〜 {{ date('G:i', strtotime($event->end_time)) }}</div>
                    </div>

                    <!-- Event Location -->
                    <div class="w-full max-w-xl">
                        <x-input-label for="location" :value="__('Event Location')" />
                        <div class="font-bold text-lg pl-2">{{ $event->location }}</div>
                    </div>

                    <!-- Event Description -->
                    <div class="w-full max-w-xl">
                        <x-input-label for="description" :value="__('Event Description')" />
                        <div class="font-bold text-lg pl-2">{{ $event->description }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
