@extends('backend.layouts.app')
@section('content')
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Service List</h3>
                <a href="{{ route('services.create') }}" class="btn btn-success float-right">Create Service</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>short_Description</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($services as $key => $slider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$slider->title}} </td>
                        <td><img src="{{ asset('upload/services/thumbnail/'.$slider->thumbnail) }}" alt="" height="150px"></td>
                        <td> {!! $slider->short_description !!}</td>
                        <td>
                            @if($slider->status == 1)
                            <a href="{{ route('services.status',$slider->id) }}" class="badge badge-success" onclick="return confirm('Are you sure you want to update this item')">On</a>
                            @else
                                <a href="{{ route('services.status',$slider->id) }}" class="badge badge-danger" onclick="return confirm('Are you sure you want to update this item')">Off</a>
                            @endif
                        </td>
                        <td>{{ $slider->created_at->format('d-M-Y') }}
                        </td>
                        <td>
                            <a href="{{ route('services.edit',$slider->id) }}" class="badge badge-primary" ><i class="fa fa-edit"></i></a>
                            <form action="{{ route('services.destroy',$slider->id) }}" method="POST">
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>short_Description</th>
                    <th>Status</th>
                    <th>Date</th>
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

