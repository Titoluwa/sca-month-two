<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function dashboard()
    {
        $books = Book::where('author_id', auth()->user()->id)->get();
        // dd($books);
        return view('dashboard', compact('books'));
    }
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function show($id)
    {
        $book = Book::where('id', $id)->first();

        return view('books.show', compact('book'));
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $book = Book::create($this->validateRequest());
        if($request->hasFile('book_cover'))
        {
            $book->book_cover = $request->file('book_cover')->store('book_cover', 'public');
        } else{
            $book->book_cover = 'default.img';
        }
        $book->author_id = auth()->user()->id;
        $book->save();

        return back()->with('message',"New Book Added!");
    }
    private function validateRequest()
    {
        return request()->validate([
            'author_id' => 'required',
            'name'=> 'required|string',
            'book_cover' => 'image|nullable|max:1999',
            'publisher' => 'required|string',
            'publication_year' => 'integer',
            'description' =>'string',
        ]);
    }
    public function edit()
    {
        return view('books.edit');
    }
    public function destroy()
    {

    }
}
