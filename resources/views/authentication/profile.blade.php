@extends('components.layout')
@section('title','Profile')

@section('content')
    <section class="content">
        <strong>
            <div id="success" class="fixed-bottom bg-danger text-white py-2 px-5 rounded  text-sm" style="margin-left:85%;"
                x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"></div>
        </strong>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('dashboard') }}" class="btn btn-danger float-right p-2"><i
                                    class="fas fa-backward"></i>
                                Back</a>
                            <h3 class="card-title">User Profile</h3>

                        </div>
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label for=""> Name:</label>
                                            {{$user->first_name}} {{$user->last_name}}
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Gender:</label>
                                            {{$user->gender}}
                                            
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('script')

        <script>
            $("#success").hide();;
            $("#message").hide();
        </script>

    @endsection
