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
        // $comments = Comment::where('book_id', $id)->get();
        return view('books.show', compact('book'));
    }
    public function create()
    {
        return view('books.create');
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
    public function store(Request $request)
    {
        $book = Book::create($this->validateRequest());
        if($request->file('book_cover'))
        {
            $file = $request->file('book_cover');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/book_cover'), $filename);
            $book->book_cover = $filename;
        } else{
            $book->book_cover = 'default.jpg';
        }
        $book->author_id = auth()->user()->id;
        $book->save();

        return redirect('dashboard');
        // return back()->with('message',"New Book Added!");
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
        if($request->file('book_cover'))
        {
            $file = $request->file('book_cover');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/book_cover'), $filename);
            $book->book_cover = $filename;
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
