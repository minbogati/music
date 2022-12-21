@extends('backend.layouts.app')
@section('content')
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>venues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">venue</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">venues Create</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form action="{{ route('venues.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}" placeholder="Enter Name">
                @if($errors->has('name'))
                    <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <input type="number" class="form-control" name="contact" id="contact" required value="{{ old('contact') }}" placeholder="Enter contact number">
                @if($errors->has('contact'))
                    <div class="error" style="color: red">{{ $errors->first('contact') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <textarea name="address" id="" cols="5" rows="3" required class="form-control"></textarea>
                @if($errors->has('address'))
                    <div class="error" style="color: red">{{ $errors->first('address') }}</div>
                @endif
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-8">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">venues List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($venues as $key => $venue)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$venue->name}} </td>
                        <td>{{$venue->contact}} </td>
                        <td>{{$venue->address}} </td>
                        <td>
                          <button type="button" class="badge badge-primary" data-toggle="modal" data-target="#assignProduct{{ $venue->id }}">
                            <i class="fa fa-edit"></i>
                         </button>
                         
                         <!-- Modal -->
                          <div class="modal fade" id="assignProduct{{ $venue->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                 
                                  <h5 class="modal-title" id="exampleModalLongTitle">Edit venue</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                 
                                 
                                 </div>
                                 <form action="{{ route('venues.update',$venue->id) }}" method="post">
                                  @method('PUT')
                                     @csrf
                                 <div class="modal-body">
                                  
                                      <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $venue->name }}" placeholder="Enter Name" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Contact</label>
                                        <input type="number" class="form-control" name="contact" id="contact" required value="{{$venue->contact }}" placeholder="Enter contact number">
                                        @if($errors->has('contact'))
                                            <div class="error" style="color: red">{{ $errors->first('contact') }}</div>
                                        @endif
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <textarea name="address" id="" cols="5" rows="3" required class="form-control">{{ $venue->address }}</textarea>
                                        @if($errors->has('address'))
                                            <div class="error" style="color: red">{{ $errors->first('address') }}</div>
                                        @endif
                                      </div>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Save changes</button>
                                 </div>
                             </form>
                             </div>
                             </div>
                         </div>
                            <form action="{{ route('venues.destroy', ['venue' => $venue->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            
                                <button type="submit" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                 
                    </tbody>
                  <tfoot>
                  <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<!-- DataTables  & Plugins -->

@endsection

