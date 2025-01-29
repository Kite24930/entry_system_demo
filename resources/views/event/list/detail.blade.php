<x-app-layout>
    <div class="flex justify-center items-center py-4 px-2">
        <div class="w-full max-w-xl">
            <h1 class="text-4xl text-slate font-bold eng-deco text-center">Event Detail</h1>
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

                    <!-- Event QR Issue -->
                    <div class="w-full max-w-xl">
                        <x-input-label for="issue" :value="__('Issue QR Code')" class="mb-2" />
                        <a href="{{ route('event.issue', ['event_id' => $event->id]) }}" class="text-lg text-slate font-bold eng-deco text-center bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            QRコード発行
                        </a>
                    </div>
                </div>
            </div>
            <div class="border border-l my-4 py-4 px-6 flex flex-col justify-center items-center rounded-lg bg-white">
                <h2 class="text-2xl text-slate font-bold eng-deco text-center">
                    参加者リスト
                </h2>
                <div class="text-sm text-slate eng-deco text-center my-2">
                    合計：{{ $entry_num }}人
                </div>
                <hr class="w-full mb-4">
                <h3 class="text-xl text-slate font-bold eng-deco text-center">
                    未入場リスト
                </h3>
                <div class="text-sm text-slate eng-deco text-center my-2">
                    {{ $not_admitted_num }}人 / {{ $entry_num }}人
                </div>
                <div class="flex flex-col justify-center items-center w-full">
                    @foreach ($not_admitted as $index => $user)
                        <div class="w-full flex flex-col gap-2 justify-center items-center py-2 @if ($index % 2 == 0) bg-gray-100 @endif">
                            <div class="text-xs text-slate">
                                {{ $user->user_belong_to . '  ' . $user->user_post }}
                            </div>
                            <div class="text-lg text-slate">
                                {{ $user->user_name }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr class="w-full my-4">
                <h3 class="text-xl text-slate font-bold eng-deco text-center">
                    入場済みリスト
                </h3>
                <div class="text-sm text-slate eng-deco text-center my-2">
                    {{ $admitted_num }}人 / {{ $entry_num }}人
                </div>
                <div class="flex flex-col justify-center items-center w-full">
                    @foreach ($admitted as $index => $user)
                        <div class="w-full flex flex-col gap-2 justify-center items-center py-2 @if ($index % 2 == 0) bg-gray-100 @endif">
                            <div class="text-xs text-slate">
                                {{ $user->user_belong_to . '  ' . $user->user_post }}
                            </div>
                            <div class="text-lg text-slate">
                                {{ $user->user_name }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
