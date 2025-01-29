<x-app-layout>
    <div class="flex justify-center items-center py-4 px-2">
        <div class="w-full max-w-xl">
            <h1 class="text-4xl text-slate font-bold eng-deco text-center">
                入場QR読み取り
            </h1>
            <div class="w-full flex flex-col justify-center items-center gap-6 my-6">
                <button id="qr-reader" type="button" class="en-text text-xl px-4 py-2 bg-green-500 text-white hover:bg-green-700 duration-300 transition-all rounded-lg shadow-lg">
                    QRコードを読み取る
                </button>
                <div class="w-full">
                    <div id="msg" class="text-center text-white bg-red-500 p-2 rounded-lg hidden">
                        カメラにアクセスできません。
                    </div>
                    <canvas id="canvas" class="w-full h-full bg-gray-500 hidden">

                    </canvas>
                    <div id="data-box" class="w-full flex flex-col justify-center items-start gap-4 px-4 py-2 rounded-lg bg-white hidden">
                        <!-- Event Name -->
                        <div class="w-full max-w-xl">
                            <x-input-label for="name" :value="__('Event Name')" />
                            <div id="event-name" class="font-bold text-lg pl-2"></div>
                        </div>

                        <!-- Event Date -->
                        <div class="w-full max-w-md">
                            <x-input-label for="date" :value="__('Event Date')" />
                            <div id="event-date" class="font-bold text-lg pl-2"></div>
                        </div>

                        <!-- Event Time -->
                        <div class="w-full max-w-md">
                            <x-input-label :value="__('Event Time')" />
                            <div id="event-time" class="font-bold text-lg pl-2"></div>
                        </div>

                        <!-- Event Location -->
                        <div class="w-full max-w-xl">
                            <x-input-label for="location" :value="__('Event Location')" />
                            <div id="event-location" class="font-bold text-lg pl-2"></div>
                        </div>

                        <!-- Event Description -->
                        <div class="w-full max-w-xl">
                            <x-input-label for="description" :value="__('Event Description')" />
                            <div id="event-description" class="font-bold text-lg pl-2"></div>
                        </div>

                        <!-- User Belong to -->
                        <div class="w-full max-w-xl">
                            <x-input-label for="name" :value="__('User Belong to')" />
                            <div id="user-belong" class="font-bold text-lg pl-2"></div>
                        </div>

                        <!-- User Post -->
                        <div class="w-full max-w-xl">
                            <x-input-label for="name" :value="__('User Post')" />
                            <div id="user-post" class="font-bold text-lg pl-2"></div>
                        </div>

                        <!-- User Name -->
                        <div class="w-full max-w-xl">
                            <x-input-label for="name" :value="__('User Name')" />
                            <div id="user-name" class="font-bold text-lg pl-2"></div>
                        </div>

                        <!-- Event Admission -->
                        <div class="w-full max-w-xl flex justify-center">
                            <form action="{{ route('admission.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="event_id" id="event-id">
                                <input type="hidden" name="entry_id" id="entry-id">
                                <button type="submit" class="en-text text-xl px-4 py-2 bg-green-500 text-white hover:bg-green-700 duration-300 transition-all rounded-lg shadow-lg">
                                    入場
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
    <input type="hidden" id="user-id" value="{{ auth()->id() }}">
    @vite(['resources/js/qrcode.js'])
</x-app-layout>
