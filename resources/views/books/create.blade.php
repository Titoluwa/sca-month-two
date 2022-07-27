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
                            <p class="font-semibold text-purple-600 text-lg">New Book Added!</p>
                        </div>
                    @endif

                  <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form class="px-80" method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                        @csrf
                            <p class="m-4 text-center text-xl text-purple-600">Add a Book</p>
                            <input type="hidden" name='author_id' value="{{ Auth::user()->id }}">
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- PUBLISHER -->
                        <div class="mt-4">
                            <x-label for="publisher" :value="__('Publisher')" />

                            <x-input id="publisher" class="block mt-1 w-full" type="text" name="publisher" :value="old('publisher')" required />
                        </div>

                        <!-- Book cover -->
                        <div class="mt-4">
                            <x-label for="book_cover" :value="__('Book Cover')" />

                            <x-input id="book_cover" class="block mt-1 w-full" type="file" name="book_cover"/>
                        </div>

                        <!-- Year of Publication -->
                        <div class="mt-4">
                            <x-label for="publication_year" :value="__('Year of Publication')" />
                            <x-input class="block mt-1 w-full" type="number" min="1900" max="2299" step="1" name="publication_year" :value="old('publication_year')" value="2022" />

                        </div>
                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input class="block mt-1 w-full" type="text" name="description" :value="old('description')" />

                        </div>

                        <div class="flex items-center justify-end mt-4">
                            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a> --}}

                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
