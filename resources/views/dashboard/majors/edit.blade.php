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


        
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
      @endif
      @if ($message = Session::get('error'))
      <div class="alert alert-error">
          <strong>{{ $message }}</strong>
      </div>
    @endif
           
            <form action="{{ route('majors.update',$major->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                            name="title" value="{{ $major->title }}">
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
                        <img src="{{ asset('majors/'. $major->image) }}" alt="" srcset="" style="width:100px;height:100px">
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