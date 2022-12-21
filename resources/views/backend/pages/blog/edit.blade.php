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
              <li class="breadcrumb-item active">Update</li>
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
                    <h3 class="card-title">Service Update</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                 
                    <div class="card-body">
                        {{-- <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data"> --}}
                            <form action="{{ route('blogs.update',$blog->id) }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                            @method('PUT')
                                @csrf
                        <div class="row">
                                <div class="col">
                               
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" id="name"  value="{{ $blog->title }}" placeholder="Enter Title">
                                        @if($errors->has('title'))
                                            <div class="error" style="color: red">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"value="{{ $blog->slug }}" placeholder="Enter Slug">
                                        @if($errors->has('slug'))
                                            <div class="error" style="color: red">{{ $errors->first('slug') }}</div>
                                        @endif
                                  </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputFile">thumbnail</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="thumbnail" id="exampleInputFile" onchange="readURL(this);">
            
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        
                                        </div>
                                        <img id="blah" src="http://placehold.it/180"  height="100px"/>
                                        <img id="blah" src="{{ asset('upload/blogs/'.$blog->image) }}" alt="Slider image"  height="100px"/>
                                        @if($errors->has('thumbnail'))
                                            <div class="error" style="color: red">{{ $errors->first('thumbnail') }}</div>
                                        @endif
                               
                                    </div>
                                </div>
                        </div>
                      
                        <div class="row">
                          
                                <div class="col">
                                    <label for="">Short Description</label>
                                    <textarea name="short_description" id="summernote" class="summernote">{{ $blog->short_description }}</textarea>
                                    @if($errors->has('short_description'))
                                    <div class="error" style="color: red">{{ $errors->first('short_description') }}</div>
                                        @endif
                                        </div>
                                </div>
                                <div class="col">
                                    <label for="">Description</label>
                                    <textarea name="description" id="summernote" class="summernote">{{ $blog->short_description }}</textarea>
                                    @if($errors->has('description'))
                                    <div class="error" style="color: red">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>
                                 
                        </div>
                        
                            
                        <div class="row">
                                <div class="form-group">
                                    <div class="custom-control custom-switch custom-switch-xl">
                                        <input type="checkbox" class="custom-control-input" name="status" value="1" id="customSwitch8" checked>
                                        <label class="custom-control-label" for="customSwitch8">Publish</label>
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
