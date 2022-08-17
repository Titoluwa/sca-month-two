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
                    <div class="mt-2 mb-6 mx-3">
                        <a href="create/book" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Add a Book
                        </a>
                    </div>
                    {{-- <p class="my-3 mx-96 py-3 text-center bg-purple-200 border-2 border-purple-600 rounded-md  hover:bg-purple-600">View My Books</p> --}}
                    @if(!empty($books))
                    <div class="grid grid-cols-1">
                        @foreach($books as $book)

                            <div class="flex m-3 p-4 bg-gray-100 rounded-lg hover:bg-gray-200 hover:shadow-xl focus:bg-gray-200">
                                <div class="flex-none bg-purple-200 text-gray-500">
                                    <img class="h-44 w-32" src="{{asset('public/storage/'.$book->book_cover)}}" alt="Book cover">
                                </div>
                                <div class="flex-initial mx-6 mt-5">
                                    <a href="/book/{{$book->id}}" class="text-lg leading-6 font-medium text-purple-700 focus:text-indigo-800 hover:text-indigo-800 focus:outline-none hover:shadow-md focus:shadow-md">{{$book->name}}</a>
                                    <p class="text-justify mt-2 text-base text-gray-600">
                                        {{$book->description}}
                                        <br> <br>
                                        <a href="book/edit/{{$book->id}}" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                            Edit
                                        </a>
                                        <form action="book/delete/{{$book->id}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="mt-4 py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Delete
                                            </button>
                                        </form>

                                    </p>
                                </div>
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
