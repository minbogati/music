@extends('backend.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
    input[type="file"] {
display: block;
}
.imageThumb {
max-height: 75px;
border: 2px solid;
padding: 1px;
cursor: pointer;
}
.pip {
display: inline-block;
margin: 10px 10px 0 0;
}
.remove {
display: block;
background: #444;
border: 1px solid black;
color: white;
text-align: center;
cursor: pointer;
}
.remove:hover {
background: white;
color: black;
}
</style>
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
                            <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                            @csrf
                        <div class="row">
                            <div class="col">
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" name="title" id="name"  value="{{ old('title') }}" placeholder="Enter Title">
                                    @if($errors->has('title'))
                                        <div class="error" style="color: red">{{ $errors->first('title') }}</div>
                                    @endif
                                  </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Enter Slug">
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
                                    <img id="blah" src="http://placehold.it/180" alt="Slider image"  height="100px"/>
                                        @if($errors->has('thumbnail'))
                                            <div class="error" style="color: red">{{ $errors->first('thumbnail') }}</div>
                                        @endif
                               
                                  </div>
                            </div>
                        </div>
                      
                        <div class="row">
                          
                             <div class="col">
                               <label for="">Short Description</label>
                               <textarea name="short_description" id="summernote" class="summernote"></textarea>
                               @if($errors->has('short_description'))
                               <div class="error" style="color: red">{{ $errors->first('short_description') }}</div>
                                @endif
                                </div>
                            </div>
                         
                            
                                <div class="col">
                                    <label for="">Description</label>
                                    <textarea name="description" id="summernote" class="summernote"></textarea>
                                    @if($errors->has('description'))
                                    <div class="error" style="color: red">{{ $errors->first('description') }}</div>
                                     @endif
                                     </div>
                                 
                            </div>
                           
                           
                       <div class="row">
                        <div class="form-group">
                           <label for="">Gallery</label>
                                <input type="file" id="files" name="files[]" multiple />
                                <br>
                            </div>
                        </div>
                       
                       
                     <div class="row">
                        <div class="col">
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
     <script>
        $(document).ready(function() {
      if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {
          var files = e.target.files,
            filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">Remove image</span>" +
                "</span>").insertAfter("#files");
              $(".remove").click(function(){
                $(this).parent(".pip").remove();
              });
              
              // Old code here
              /*$("<img></img>", {
                class: "imageThumb",
                src: e.target.result,
                title: file.name + " | Click to remove"
              }).insertAfter("#files").click(function(){$(this).remove();});*/
              
            });
            fileReader.readAsDataURL(f);
          }
          console.log(files);
        });
      } else {
        alert("Your browser doesn't support to File API")
      }
    });
    </script>
    
@endsection
