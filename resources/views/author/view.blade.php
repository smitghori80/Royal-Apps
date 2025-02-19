

@extends('components.layout')
@section('title', 'Author list')
@section('content')



    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title m-3 p-2">Author List </h4>
                        
                    </div>
                    <div class="col-md-2">
                    <a href="{{ route('dashboard') }}" class="btn btn-danger float-right " style="float: right"><i
                                class="fas fa-backward"></i>
                            Back</a>
                    </div>
                </div>

                <h1>Author: {{ $author['first_name'] }} {{ $author['last_name'] }}</h1>

                <h2>Books</h2>
    
                <table class="table table-bordered data-table  table-striped">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>number of pages</th>
                            <th>release_date</th>
                            <th>description</th>
                            <th>format</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($author['books'] as $book)
                        <tr>
                            <td>{{ $book['title'] }}</td>
                            <td>{{ $book['number_of_pages'] }}</td>
                            <td>{{ $book['release_date'] }}</td>
                            <td>{{ $book['description'] }}</td>
                            <td>{{ $book['format'] }}</td>
                            
                            <td>
                                <form action="{{ route('book.delete', ['id' => $book['id']]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
@endsection
