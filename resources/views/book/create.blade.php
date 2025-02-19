<!-- Main content -->

@extends('components.layout')
@section('title','Book create')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Book</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Book</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <form class="form-horizontal" action={{ route('book.store') }} method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title">Add book </h4>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-danger float-right " style="float: right"><i
                                class="fas fa-backward"></i>
                            Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="">title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                            placeholder="Enter book title" id="title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                 
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Author</label>
                            @if (!empty($authors['items']))
                                <select class="form-control custom-select" name="author_id" id="author">
                                    @foreach ($authors['items'] as $key => $author)
                                        <option value="{{ $author['id'] }}"
                                            @selected(old('author_id', $key === 0 ? $author['id'] : '') == $author['id'])>
                                            {{ $author['first_name'] }} {{ $author['last_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <p>No authors found.</p>
                            @endif


                        </div>
                        @error('author_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}"
                            placeholder="Enter book description" id="description">
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="">isbn</label>
                        <input type="text" class="form-control" name="isbn" value="{{ old('isbn') }}"
                            placeholder="Enter book isbn" id="isbn">
                        @error('isbn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">format</label>
                        <input type="text" class="form-control" name="format" value="{{ old('format') }}"
                            placeholder="Enter book format" id="format">
                        @error('format')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Release date</label>
                        <input type="date" class="form-control" name="release_date" value="{{ old('release_date') }}"
                            placeholder="Enter book release_date" id="release_date">
                        @error('release_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">number of pages</label>
                        <input type="number" class="form-control" name="number_of_pages" value="{{ old('number_of_pages') }}"
                            placeholder="Enter book number_of_pages" id="number_of_pages">
                        @error('number_of_pages')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                        
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Create Book</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('script')
   
@endsection
