@extends('dashboard.app')

@section('content')


<div class="container mt-5">

    <div class="">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">MAjors</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
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
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $majors as  $major)
                  
               
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $major->title }}</td>
                  <td>
                   <img src="{{ asset('majors/'. $major->image) }}" alt="" srcset="" style="width:100px;height:100px">
                  </td>
                  <td class="d-flex justify-content-between">
                    <a href="{{ route("majors.edit",$major->id) }}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('majors.delete',$major->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
               
                @endforeach
              </tbody>
            </table>
          </div>
        

   
      </div>

</div>


@endsection