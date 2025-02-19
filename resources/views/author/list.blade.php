
@extends('components.layout')
@section('title', 'Author list')
@section('content')



    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title m-3 p-2">Author List </h4>
                        
                    </div>
                    <div class="col-md-2">
                    <a href="{{ route('author.create') }}" class="btn btn-info float-right " style="float: right">
                            Create new Profile</a>
                    </div>
                    <div class="col-md-2">
                    <a href="{{ route('book.create') }}" class="btn btn-info float-right " style="float: right">
                            Create new Book</a>
                    </div>
                </div>

                <table class="table table-bordered data-table  table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($authors['items'] as $author)
                <tr>
                    <td>{{ $author['id'] }}</td>
                    <td>{{ $author['first_name'] }} {{ $author['last_name'] }}</td>
                    <td>{{ $author['gender'] }}</td>
                    <td>
                        <a href="{{ route('author.view', ['id' => $author['id']]) }}" class="btn btn-info">View</a>
                    </td>
                    <td>
                        <form action="{{ route('author.delete', ['id' => $author['id']]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this author?')">Delete</button>
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
