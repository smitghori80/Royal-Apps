<!-- Main content -->
@extends('components.layout')
@section('title','Author create')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Author</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Author</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <form class="form-horizontal" action={{ route('author.store') }} method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="card-title">Add author </h4>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-danger float-right " style="float: right"><i
                                class="fas fa-backward"></i>
                            Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                            placeholder="Enter author first name" id="first_name">
                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                            placeholder="Enter author last name" id="last_name">
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Biography Name</label>
                        <input type="text" class="form-control" name="biography" value="{{ old('biography') }}"
                            placeholder="Enter author biography" id="biography">
                        @error('biography')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Place of birth</label>
                        <input type="text" class="form-control" name="place_of_birth" value="{{ old('place_of_birth') }}"
                            placeholder="Enter author place of birth" id="place_of_birth">
                        @error('place_of_birth')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">birthday</label>
                        <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}"
                            placeholder="Enter author birthday" id="birthday">
                        @error('birthday')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-check" id="gender">
                                    <label>Gender</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="male" type="radio" name="gender" value="male"
                                        {{ old('gender') == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="female" type="radio" name="gender" value="female"
                                        {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Create author</button>
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
