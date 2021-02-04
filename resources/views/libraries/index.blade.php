@extends('home')

@section('main')
<div class="row">
<div class="col-sm-12">
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
@endif
    <h1 class="display-3">Books</h1>   
    <div>
    <a style="margin: 19px;" href="{{ route('libraries.create')}}" class="btn btn-primary">Add Book</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr class="align-middle">
          <td>Book Name</td>
          <td>Author</td>
          <td>Edition</td>
          <td>Publisher</td>
          <td>Publishing Year</td>
          <td>Available Copies</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>

    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->book_name}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->edition}}</td>
            <td>{{$book->publisher}}</td>
            <td>{{$book->publishing_year}}</td>
            <td>{{$book->total_copies}}</td>
            <td>
                <a href="{{ route('libraries.edit', $book->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('libraries.destroy', $book->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection