@extends('home')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Book</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('libraries.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">Book Name:</label>
              <input type="text" class="form-control" name="book_name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Author Name:</label>
              <input type="text" class="form-control" name="author"/>
          </div>

          <div class="form-group">
              <label for="email">Edition:</label>
              <input type="text" class="form-control" name="edition"/>
          </div>
          <div class="form-group">
              <label for="city">Publisher:</label>
              <input type="text" class="form-control" name="publisher"/>
          </div>
          <div class="form-group">
              <label for="country">Publishing Year:</label>
              <input type="text" class="form-control" name="publishing_year"/>
          </div>
          <div class="form-group">
              <label for="job_title">Available Copies:</label>
              <input type="text" class="form-control" name="total_copies"/>
          </div>                         
          <button type="submit" class="btn btn-primary">Add Book</button>
      </form>
  </div>
</div>
</div>
@endsection