@extends('backend.layouts.app')
@section('content')
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">event</li>
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
                <h3 class="card-title">event List</h3>
                <a href="{{ route('events.create') }}" class="btn btn-success float-right">Create event</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Amount</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($events as $key => $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$event->title}} </td>
                        <td><img src="{{ asset('upload/events/'.$event->image) }}" alt="" height="150px"></td>
                        
                        <td>{{ $event->amount }}</td>
                        <td>
                          @php
                            $venue =  App\Models\Artist::where('id',$event->artist_id)->first();
                          @endphp 
                          {{ $venue->name }}   
                          </td>
                        <td>
                        @php
                          $genre =  App\Models\Genre::where('id',$event->genre_id)->first();
                        @endphp 
                        {{ $genre->name }}   
                        </td>
                        <td>
                            @php
                              $venue =  App\Models\Venue::where('id',$event->venue_id)->first();
                            @endphp 
                            {{ $venue->name }}   
                            </td>
                        <td>{{ $event->date }}
                        </td>
                        <td>
                            <a href="{{ route('events.edit',$event->id) }}" class="badge badge-primary" ><i class="fa fa-edit"></i></a>
                            <form action="{{ route('events.destroy',$event->id) }}" method="POST">
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
                    <th>Amount</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Venue</th>
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

