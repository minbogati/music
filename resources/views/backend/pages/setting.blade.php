@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('settings.update',$setting->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
          <div class="row">
            
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Company Setting Update</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                 
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Name</label>
                                    <input type="text" class="form-control" name="name" id="name"  value="{{ $setting->name }}" placeholder="Enter Company Name">
                                    @if($errors->has('name'))
                                        <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                                    @endif
                                  </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{ $setting->phone }}" placeholder="Phone">
                                    @if($errors->has('phone'))
                                        <div class="error" style="color: red">{{ $errors->first('phone') }}</div>
                                    @endif
                                  </div>
                            </div>
                        </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputFile">Logo</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">

                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                  <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                </div>
                                    @if($errors->has('logo'))
                                        <div class="error" style="color: red">{{ $errors->first('logo') }}</div>
                                    @endif
                           
                            <img src="{{ asset('upload/images/company_profile/'.$setting->logo) }}" alt="" height="100px">
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputFile">Favicon</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="favicon" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                  <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                </div>
                                @if($errors->has('favicon'))
                                        <div class="error" style="color: red">{{ $errors->first('favicon') }}</div>
                                    @endif
                            
                            <img src="{{ asset('upload/images/company_profile/'.$setting->favicon) }}" alt="" height="100px">
                              </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Address</label>
                                <textarea name="address" class="form-control" id="" cols="20" rows="2">{{ $setting->address }}</textarea>
                                @if($errors->has('address'))
                                        <div class="error" style="color: red">{{ $errors->first('address') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Introduction</label>
                                <textarea name="introduction" class="form-control" id="" cols="20" rows="2">{{ $setting->introduction }}</textarea>
                                @if($errors->has('introduction'))
                                        <div class="error" style="color: red">{{ $errors->first('introduction') }}</div>
                                    @endif
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Company Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $setting->email }}" id="name" placeholder="Enter Company Name">
                                @if($errors->has('email'))
                                        <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                                    @endif
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telephone</label>
                                <input type="number" class="form-control" name="telephone" id="telephone" value="{{ $setting->telephone }}" placeholder="telephone">
                                @if($errors->has('telephone'))
                                        <div class="error" style="color: red">{{ $errors->first('telephone') }}</div>
                                    @endif
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Working  Hours</label>
                                <input type="text" class="form-control" name="working_hours" id="name" value="{{ $setting->working_hours }}" placeholder="Enter Company Name">
                                @if($errors->has('working_hours'))
                                        <div class="error" style="color: red">{{ $errors->first('working_hours') }}</div>
                                    @endif
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Working Days</label>
                                <input type="text" name="working_days" class="form-control" id="phone" value="{{ $setting->working_days }}" placeholder="Working Days">
                                @if($errors->has('working_days'))
                                <div class="error" style="color: red">{{ $errors->first('working_days') }}</div>
                            @endif
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Map (<small>Embeded Map</small>)</label>
                                <input type="text" class="form-control" name="map" id="name" value="{{ $setting->map }}" placeholder="Enter Company Name">
                                @if($errors->has('map'))
                                        <div class="error" style="color: red">{{ $errors->first('map') }}</div>
                                    @endif
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Video (<small>Embeded Link</small>)</label>
                                <textarea name="video" id="" cols="20" rows="2" class="form-control">{{ $setting->video }}</textarea>
                                @if($errors->has('video'))
                                <div class="error" style="color: red">{{ $errors->first('video') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                     <div class="row">
                      <div class="col">
                        <label for="">Mission Vission</label>
                        <textarea name="mission_vision" id="" class="summernote" cols="30" rows="10">{{ $setting->mission_vision }}</textarea>
                      </div>
                      <div class="col">
                        <label for="">Strenght</label>
                        <textarea name="strength" id="" class="summernote" cols="30" rows="10">{{ $setting->strength }}</textarea>
                      </div>
                     </div>
                      
                     
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update Company Profile</button>
                    </div>
                 
                </div>
                <!-- /.card -->
            </div>
              <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Social Media & Other</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                   
                      <div class="card-body">
                          
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Facebook</label>
                                  <input type="url" class="form-control" name="facebook" id="name" value="{{ $setting->facebook }}" placeholder="Enter facbook Url">
                                  @if($errors->has('facebook'))
                                        <div class="error" style="color: red">{{ $errors->first('facebook') }}</div>
                                    @endif
                                </div>
                             
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Instagram</label>
                                  <input type="url" class="form-control" name="instagram" id="name" value="{{ $setting->instagram }}" placeholder="Enter instagram Url">
                                  @if($errors->has('instagram'))
                                        <div class="error" style="color: red">{{ $errors->first('instagram') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Twitter</label>
                                    <input type="url" class="form-control" name="twitter" id="name" value="{{ $setting->twitter }}" placeholder="Enter twitter Url">
                                    @if($errors->has('twitter'))
                                        <div class="error" style="color: red">{{ $errors->first('twitter') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Linkedin</label>
                                    <input type="url" class="form-control" name="linked_in" id="name" value="{{ $setting->linked_id }}" placeholder="Enter linkedin Url">
                                    @if($errors->has('linked_in'))
                                        <div class="error" style="color: red">{{ $errors->first('linked_in') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Youtube</label>
                                    <input type="url" class="form-control" name="youtube" id="name" value="{{ $setting->youtube }}" placeholder="Enter youtube Url">
                                    @if($errors->has('youtube'))
                                        <div class="error" style="color: red">{{ $errors->first('youtube') }}</div>
                                    @endif
                                </div>
                                
                                <hr>
                                <label for="">Search engine section</label>
                                <hr>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta title</label>
                                    <input type="text" class="form-control" name="meta_title" id="name" value="{{ $setting->meta_title }}" placeholder="Enter meta  title">
                                    @if($errors->has('meta_title'))
                                        <div class="error" style="color: red">{{ $errors->first('meta_title') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta Keywords </label>
                                    <textarea name="meta_keywords" id="" cols="20" rows="2" class="form-control">{{ $setting->meta_keywords }}</textarea>
                                    @if($errors->has('meta_keywords'))
                                    <div class="error" style="color: red">{{ $errors->first('meta_keywords') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta Content</label>
                                    <textarea name="meta_content" id="" cols="20" rows="2" class="form-control">{{ $setting->meta_content }}</textarea>
                                    @if($errors->has('meta_content'))
                                    <div class="error" style="color: red">{{ $errors->first('meta_content') }}</div>
                                    @endif
                                </div>
                                
                      </div>
                      <!-- /.card-body -->
                    
                     
                  </div>
              </div>
           
            </div>
        </form>
        </div><!-- /.container-fluid -->
      </section>
     
@endsection
