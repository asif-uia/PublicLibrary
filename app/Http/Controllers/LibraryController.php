<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Library::all();

        return view('libraries.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libraries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'book_name' => 'required',
            'author' => 'required',
            'edition' => 'required',
            'publisher' => 'required'
        ]);

        $book = new Library([
            'book_name' => $request->get('book_name'),
            'author' => $request->get('author'),
            'edition' => $request->get('edition'),
            'publisher' => $request->get('publisher'),
            'publishing_year' => $request->get('publishing_year'),
            'total_copies' => $request->get('total_copies')
        ]);
        
        $book -> save();
        return redirect('/')->with('success', 'Book Saved!');
        print_r($book->book_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Library::find($id);
        return view('libraries.edit', compact('book')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'book_name' => 'required',
            'author' => 'required',
            'edition' => 'required',
            'publisher' => 'required'
        ]);

        $book = Library::find($id);
        $book->book_name =  $request->get('book_name');
        $book->author = $request->get('author');
        $book->edition = $request->get('edition');
        $book->publisher = $request->get('publisher');
        $book->publishing_year = $request->get('publishing_year');
        $book->total_copies = $request->get('total_copies');
        $book->save();

        return redirect('/')->with('success', 'Library Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Library::find($id);
        $book->delete();

        return redirect('/')->with('success', 'Book Deleted!');
    }
}
