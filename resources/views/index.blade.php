<x-guest-layout>
    <h1 class="font-serif font-bold text-2xl text-center">入場管理システム デモ</h1>
    <div class="flex flex-col gap-6 justify-center items-center my-4 mx-6">
        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ログイン</a>
        <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">新規登録</a>
    </div>
</x-guest-layout>
