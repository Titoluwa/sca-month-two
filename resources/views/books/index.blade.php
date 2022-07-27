<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-900 leading-tight font-serif">
            {{ __('miniLibrary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-9 bg-white border-b border-gray-200">
                    <div class="mt-2 mb-6 mx-3">
                        <a href="create/book" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Add a Book
                        </a>
                    </div>
                    {{-- <p class="py-8">No Books Found</p> --}}
                    @if(!empty($books))
                    <div class="grid grid-cols-2 gap-3">
                        @foreach($books as $book)

                            <a href="/book/{{$book->id}}" class="flex m-3 p-4 bg-gray-100 rounded-lg hover:bg-gray-200 hover:shadow-xl focus:bg-gray-200 focus:shadow-xl focus:outline-none">

                                <div class="flex-none bg-purple-200 text-gray-500">
                                    <img class="h-44 w-32" src="{{asset('storage/'.$book->book_cover)}}" alt="Book cover">
                                </div>
                                <div class="flex-initial mx-6">
                                    <p class="mt-5 text-lg leading-6 font-medium text-purple-700">{{$book->name}}</p>
                                    <p class="text-justify mt-2 text-base text-gray-600">{{$book->description}}</p>
                                </div>
                            </a>

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
