@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Service</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
           
          <div class="row">
            
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Service Create</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                 
                    <div class="card-body">
                        {{-- <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data"> --}}
                            <form action="{{ route('events.update',$event->id) }}" method="post" enctype="multipart/form-data" id="image-upload">
                                @method('put')
                            @csrf
                        <div class="row">
                                <div class="col">
                               
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" id="name" required  value="{{ $event->title }}" placeholder="Enter Title">
                                        @if($errors->has('title'))
                                            <div class="error" style="color: red">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Artist</label>
                                        <select name="artist_id" id="artist_id" class="form-control" required>
                                            <option value="" selected disabled>Select Artist</option>
                                            @foreach ($data['artists'] as $artist)
                                              <option value="{{ $artist->id }}" {{ $artist->id == $event->artist_id ? 'selected' : '' }}>{{ $artist->name }}</option> 
                                            @endforeach
                                        </select>
                                        @if($errors->has('artist_id'))
                                            <div class="error" style="color: red">{{ $errors->first('artist_id') }}</div>
                                        @endif
                                  </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Genre</label>
                                        <select name="genre_id" id="genre_id" class="form-control" required>
                                            <option value="">Select Genre</option>
                                            @foreach ($data['genres'] as $genre)
                                              {{-- <option value="{{ $genre->id }}">{{ $genre->name }}</option>  --}}
                                              <option value="{{ $genre->id }}" {{ $genre->id == $event->genre_id ? 'selected' : '' }}>{{ $genre->name }}</option> 
                                            @endforeach
                                        </select>
                                        @if($errors->has('genre_id'))
                                            <div class="error" style="color: red">{{ $errors->first('genre_id') }}</div>
                                        @endif
                                  </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile" onchange="readURL(this);">
            
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        
                                        </div>
                                        <img id="blah" src="http://placehold.it/180" alt="Slider image"  height="100px"/>
                                        <img src="{{ asset('upload/events/'.$event->image) }}" alt="" height="100px">
                                        @if($errors->has('image'))
                                            <div class="error" style="color: red">{{ $errors->first('image') }}</div>
                                        @endif
                               
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col">
                           
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount" required  value="{{ $event->amount }}" placeholder="Enter Amount">
                                    @if($errors->has('amount'))
                                        <div class="error" style="color: red">{{ $errors->first('amount') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Venue</label>
                                    <select name="venue_id" id="venue_id" class="form-control" required>
                                        <option value="">Select Genre</option>
                                        @foreach ($data['venues'] as $venue)
                                          <option value="{{ $venue->id }}" {{ $venue->id == $event->venue_id ? 'selected' : '' }}>{{ $venue->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('venue_id'))
                                        <div class="error" style="color: red">{{ $errors->first('venue_id') }}</div>
                                    @endif
                              </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputFile">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ $event->date }}">
                                    @if($errors->has('date'))
                                        <div class="error" style="color: red">{{ $errors->first('date') }}</div>
                                    @endif
                           
                                </div>
                            </div>
                    </div>
                        <div class="row">
                          
                                <div class="col">
                                    <label for="">Short Description</label>
                                    <textarea name="short_description" id="summernote" class="summernote">{{ $event->short_description }}</textarea>
                                    @if($errors->has('short_description'))
                                    <div class="error" style="color: red">{{ $errors->first('short_description') }}</div>
                                        @endif
                                        </div>
                                </div>
                               
                                 
                        </div>
                    
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </form>
                </div>
                <!-- /.card -->
            </div>
            
           
            </div>
       
        </div><!-- /.container-fluid -->
      </section>
     <script>
             function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
     </script>
     
    
@endsection
