<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-900 leading-tight font-serif">
            {{ __('miniLibrary') }}
            {{-- {{ $book->name }} --}}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="bg-white max-w-2xl mx-auto grid items-start grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2 shadow-sm sm:rounded-lg border-b border-gray-200">
        <div class="">
            <h2 class="text-3xl font-extrabold tracking-tight text-purple-700 sm:text-4xl">{{$book->name}} </h2><span class="mt-2 font-bold text-gray-400">Written by: <span class="text-purple-500">{{$book->author->name}}</span></span>
            <p class="mt-4 text-gray-500">{{$book->description}}</p>

            <dl class="mt-6 grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2 sm:gap-y-8 lg:gap-x-8">
                <div class="border-t border-gray-200 pt-4">
                    <dt class="font-medium text-gray-900">Publisher</dt>
                    <dd class="mt-2 text-sm text-gray-500">{{ $book->publisher }}</dd>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <dt class="font-medium text-gray-900">Year of Publication</dt>
                    <dd class="mt-2 text-sm text-gray-500">{{ $book->publication_year }}</dd>
                </div>
                @if(session()->has("new_comment_message"))
                    <div class="p-3 bg-purple-200">
                        <p class="text-center font-semibold text-purple-600 text-lg">New Comment Added!</p>
                    </div>
                    <div>

                    </div>
                @elseif(session()->has("comment_delete_message"))
                    <div class="p-3 bg-pink-200">
                        <p class="text-center font-semibold text-pink-600 text-lg">Comment Deleted!</p>
                    </div>
                    <div>

                    </div>
                @endif
                <div class="border-t border-gray-200 pt-4">
                    <dt class="font-medium text-gray-900">Comments</dt>
                    <ol class="list-decimal list-inside">
                        @foreach ($book->comments as $comment)
                            <li class="mt-2 text-sm text-gray-500">{{$comment->comment}}</li>
                            @if($comment->user_id == auth()->user()->id)
                                <form action="/comment/delete/{{$comment->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mt-2 ml-52 py-1 px-2 border border-transparent text-sm font-sm rounded text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        delete
                                    </button>
                                </form>
                            @elseif($book->author_id == auth()->user()->id)
                                <form action="/comment/delete/{{$comment->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mt-2 ml-52 py-1 px-2 border border-transparent text-sm font-sm rounded text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        delete
                                    </button>
                                </form>
                            @endif
                        @endforeach
                    </ol>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Add Comment</label>
                    <div class="">
                        <form action="/comment" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" id="book_id" value="{{$book->id}}">
                            <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                            <input type="text" name="comment" id="comment" class="mt-1 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full px-3 sm:text-sm border-gray-300 rounded-md">
                            <button type="submit" class="mt-3 ml-52 py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Add</button>
                        </form>
                    </div>
                </div>
            </dl>
        </div>
        <div class="grid grid-cols-1">
            <img src="{{asset('storage/'.$book->book_cover)}}" alt="{{$book->name}}" class="bg-gray-100 rounded-lg">
        </div>
    </div>
</div>

</x-app-layout>
