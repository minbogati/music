@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.card')  
<!-- Topic Cards -->
       <div id="cards_landscape_wrap-2">
        <section class="search-sec">
          <div class="container">
            <h4>Filters product</h4>
            <hr>
              <form action="{{ route('advance.search.event') }}" method="get" novalidate="novalidate">
                @csrf
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="row">
                             
                              <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt" name="artist_id" required>
                                    <option>Choose Artist</option>
                                    @foreach ($data['artists'] as $artist)
                                      <option value="{{ $artist->id }}">{{ $artist->name }}</option>  
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="genre_id">
                                  <option>Choose Genre</option>
                                  @foreach ($data['genres'] as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>  
                                  @endforeach
                              </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <select class="form-control search-slt" name="venue_id">
                                  <option>Choose Venue</option>
                                  @foreach ($data['venues'] as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>  
                                  @endforeach
                              </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="date" name="date" class="form-control">
                            </div>
                              <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                  <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
        </section>
        <div class="container">
          
            <div class="row">
              
              @forelse ($events as $event)
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <a href="">
                    <div class="card-flyer">
                        <div class="text-box">
                            <div class="image-box">
                                <img src="{{ asset('upload/events/'.$event->image) }}" alt="" />
                            </div>
                            <div class="text-container">
                                <h6>{{ $event->title }}</h6>
                                {{-- {!! $event->short_description !!} --}}
                                {!! Str::words($event->short_description, 30, ' ...') !!}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
              @empty
                <p>Events Not Found</p>
              @endforelse
                
                
            </div>
            {{ $events->links() }}
        </div>
      </div>
@endsection