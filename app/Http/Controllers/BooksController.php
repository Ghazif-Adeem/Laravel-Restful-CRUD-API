<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() {
        // Fetches All Records from DB
        return response()->json(Book::all());
    }

    public function show(Book $book) {
        return response()->json($book);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:5|max:50',
            'author' => 'required|min:5|max:20',
            'desc' => 'required|min:10'
        ]);

        $book = Book::create($request->json()->all());

        return response()->json($book, 200);
    }

    public function update(Request $request, Book $book) {
        $this->validate($request, [
            'title' => 'required|min:5|max:50',
            'author' => 'required|min:5|max:20',
            'desc' => 'required|min:10'
        ]);

        $book->update($request->json()->all());

        return response()->json('Updated', 200);
    }

    public function destroy(Book $book) {
        $book->delete();

        return response()->json('Deleted!', 200);
    }
}
