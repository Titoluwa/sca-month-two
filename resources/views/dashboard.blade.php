<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-900 leading-tight font-serif">
            {{ __('miniLibrary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="leading-loose text-center text-4xl text-purple-800 font-bold">Welcome {{ Auth::user()->name }}</p>
                    <p class="text-center text-xl">You're logged in!</p>
                    <p class="my-3 mx-96 py-3 text-center bg-purple-200 border-2 border-purple-600 rounded-md  hover:bg-purple-600">View My Books</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
