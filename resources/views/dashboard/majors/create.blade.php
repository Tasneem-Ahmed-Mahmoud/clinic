@extends('dashboard.app')

@section('content')


<div class="container mt-5">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="card card-primary col-12">
            <div class="card-header">
                <h3 class="card-title">Create Major</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('majors.store') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                            name="title">
                        @error("title")
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="image">
                            @error("image")
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


    </div>
</div>

@endsection