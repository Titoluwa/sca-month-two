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
                    <a href="/book/add" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Add Book
                    </a>
                    {{-- <p class="py-8">No Books Found</p> --}}
                    @if(!empty($books))
                    <div class="grid grid-cols-2 gap-3">
                        @foreach($books as $book)

                            <div class="py-6">
                                <dt>
                                    <div class="items-center justify-center h-24 w-24 rounded-md bg-purple-500 text-white">
                                        <img src="{{asset('storage/'. $book->book_cover)}}" alt="">
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{$book->name}}</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500"> Book Description: {{$book->description}}</dd>
                            </div>

                        @endforeach
                    </div>
                    @else
                        <p class="py-8">No Books Found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
