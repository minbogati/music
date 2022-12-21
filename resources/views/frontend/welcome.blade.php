@extends('frontend.layouts.app')
@section('content')
 @include('frontend.layouts.card')    
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://giuda.net/bootstrap/images/speaks-evil-LP.png" alt="New York" width="1200" height="700">
      <div class="carousel-caption">
        <h3>Speaks Evil LP</h3>
        <p>Lp out now from Burning Heart Records</p>
      </div>
    </div>

    <div class="item">
      <img src="http://giuda.net/bootstrap/images/giuda-horde.png" alt="Chicago" width="1200" height="700">
      <div class="carousel-caption">
        <h3>Giuda Horde Paris</h3>
        <p>Thank you, France - Giuda Horde Fan Club.</p>
      </div>
    </div>
  
    <div class="item">
      <img src="http://giuda.net/bootstrap/images/Giuda-Rolltheballs-Video.png" alt="Los Angeles" width="1200" height="700">
      <div class="carousel-caption">
        <h3>Roll The Balls</h3>
        <p>Frame of the Roll The Balls video Clip</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


       <!-- Topic Cards -->
       <div id="cards_landscape_wrap-2">
        <section class="search-sec">
          <div class="container">
            <hr>
              <form action="{{ route('search.event') }}" method="get" novalidate="novalidate">
                @csrf
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="row">
                              <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                  <input type="text" class="form-control" name="title" placeholder="Enter Event title">
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
              
              @forelse ($data['events'] as $event)
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
            {{ $data['events']->links() }}
        </div>
      </div>

      @endsection






