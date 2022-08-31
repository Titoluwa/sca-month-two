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
                    @if(session()->has("message"))
                        <div class="mx-72 p-5 bg-purple-200">
                            <p class="font-semibold text-purple-600 text-lg">Book has been Updated!</p>
                        </div>
                    @endif

                  <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form class="px-80" method="POST" action="{{ route('book.update') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <p class="m-4 text-center text-xl text-purple-600">Edit {{$book->name}}</p>
                            <input type="hidden" name="id" value="{{$book->id}}">
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$book->name}}" required autofocus />
                        </div>

                        <!-- PUBLISHER -->
                        <div class="mt-4">
                            <x-label for="publisher" :value="__('Publisher')" />

                            <x-input id="publisher" class="block mt-1 w-full" type="text" name="publisher" value="{{$book->publisher}}" required />
                        </div>

                        <!-- Book cover -->
                        <div class="mt-4">
                            <x-label for="book_cover" :value="__('Book Cover')" />
                            <img class="h-44 w-32 m-3" src="{{ url('public/book_cover/'.$book->book_cover) }}" alt="Book cover">
                            <x-input id="book_cover" class="block mt-1 w-full" type="file" name="book_cover"/>
                        </div>

                        <!-- Year of Publication -->
                        <div class="mt-4">
                            <x-label for="publication_year" :value="__('Year of Publication')" />
                            <x-input class="block mt-1 w-full" type="number" min="1900" max="2299" step="1" name="publication_year" value="{{$book->publication_year}}" />

                        </div>
                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input class="block mt-1 w-full" type="text" name="description" value="{{$book->description}}" />

                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4 bg-purple-500 hover:bg-purple-700">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
