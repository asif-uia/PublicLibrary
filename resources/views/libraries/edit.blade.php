@extends('home') 

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Book Info</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('libraries.update', $book->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="book_name">Book Name:</label>
                <input type="text" class="form-control" name="book_name" value={{ $book->book_name }} />
            </div>

            <div class="form-group">
                <label for="author">Author Name:</label>
                <input type="text" class="form-control" name="author" value={{ $book->author }} />
            </div>

            <div class="form-group">
                <label for="edition">Edition:</label>
                <input type="text" class="form-control" name="edition" value={{ $book->edition }} />
            </div>
            <div class="form-group">
                <label for="publisher">Publisher:</label>
                <input type="text" class="form-control" name="publisher" value={{ $book->publisher }} />
            </div>
            <div class="form-group">
                <label for="publishing_year">Publishing Year:</label>
                <input type="text" class="form-control" name="publishing_year" value={{ $book->publishing_year }} />
            </div>
            <div class="form-group">
                <label for="total_copies">Available Copies:</label>
                <input type="text" class="form-control" name="total_copies" value={{ $book->total_copies }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection