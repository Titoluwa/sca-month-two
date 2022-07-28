<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function dashboard()
    {
        $books = Book::where('author_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('dashboard', compact('books'));
    }
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function show($id)
    {
        $book = Book::findorFail($id);
        $comments = Comment::where('book_id', $id)->get();
        return view('books.show', compact('book', 'comments'));
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
            $book->book_cover = 'book_cover/default.jpg';
        }
        $book->author_id = auth()->user()->id;
        $book->save();

        return redirect('dashboard');
        // return back()->with('message',"New Book Added!");
    }
    private function validateRequest()
    {
        return request()->validate([
            'author_id' => 'integer',
            'name'=> 'required|string',
            'book_cover' => 'image|nullable|max:1999',
            'publisher' => 'required|string',
            'publication_year' => 'integer',
            'description' =>'string',
        ]);
    }
    public function edit($id)
    {
        $book = Book::findorFail($id);
        return view('books.edit', compact('book'));
    }
    public function update(Request $request)
    {
        $book = Book::findorFail($request->id);
        $book->name = $request->name;
        $book->publisher = $request->publisher;
        $book->publication_year = $request->publication_year;
        $book->description = $request->description;
        if($request->hasFile('book_cover'))
        {
            $book->book_cover = $request->file('book_cover')->store('book_cover', 'public');
        }
        $book->update();

        return back()->with('message',"Book has been Updated!");
    }
    public function destory($id)
    {
        $book = Book::findorFail($id);
        $book->delete();
        return back()->with('message',"Book Deleted!");
    }
}
