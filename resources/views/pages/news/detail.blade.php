@extends('layouts.front')

@section('content')
<!--Inner Header Start-->
<section class="wf100 p100 inner-header" style="background: url({{ asset('front/banner/banner-breadcrumb.png') }})">
   <div class="container">
      <h1>{{ $detail->title }}</h1>
   </div>
</section>
<!--Inner Header End--> 
<!--Blog Start-->
<section class="wf100 p80 blog">
   <div class="blog-details">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 col-md-8">
               <!--Blog Single Content Start-->
               <div class="blog-single-content">
                  <div class="blog-single-thumb"><img src="{{ asset('uploads/'.$detail->image) }}" alt=""></div>
                  <h3>{{ $detail->title }}</h3>
                  <ul class="post-meta">
                     <li><i class="fas fa-calendar-alt"></i>{{ date('d F Y', strtotime($detail->published_at));}}</li>
                  </ul>
                  {!! $detail->content !!}
               </div>
               <!--Blog Single Content End--> 
            </div>
            <!--Sidebar Start-->
            <div class="col-lg-3 col-md-4">
               <div class="sidebar">
                  <!--Widget Start-->
                  <div class="side-widget">
                     <h5>Search</h5>
                     <div class="side-search">
                        <form>
                           <input type="search" class="form-control" placeholder="Search">
                           <button><i class="fas fa-search"></i></button>
                        </form>
                     </div>
                  </div>
                  <!--Widget End--> 
                 
                  <!--Widget Start-->
                  <div class="side-widget">
                     <h5>Pulau Bakut</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras urna ex, semper quis urna non, bibendum rutrum lectus. Mauris vel rhoncus urna. Suspendisse dapibus eget lorem interdum placerat. Nam ultrices non nunc et sodales.</p>
                  </div>
                  <!--Widget Start--> 
                  <!--Widget Start-->
                  <div class="side-widget">
                     <h5>Berita Lainya</h5>
                     <ul class="lastest-products">
                        @foreach ($news as $item) 
                        <li> 
                            <img src="{{ asset('uploads/'.$item->image) }}" style="width:66px;height:66px" alt=""> 
                            <strong><a href="{{ route('news.detail', $item->slug) }}">{{ \Illuminate\Support\Str::limit($item->title, $limit = 25, $end = '...') }}</a></strong> 
                            <span class="pdate"><i class="fas fa-calendar-alt"></i> {{ date('d F Y', strtotime($item->published_at));}}</span> 
                        </li>
                        @endforeach
                     </ul>
                  </div>
                  <!--Widget Start--> 
                  
                  <!--Widget Start-->
                  <div class="side-widget">
                     <h5>Event</h5>
                     <div id="side-slider" class="owl-carousel owl-theme">
                        <!--Item Start-->
                        <div class="item">
                           <div class="pro-box">
                              <img src="{{ asset('front/banner/banner-wisata-cagar-alam.png') }}" alt="">
                              <h5>Wisata Cagar Alam</h5>
                              <div class="pro-hover">
                                 <h6>Wisata Cagar Alam</h6>
                                 <p>Gunung Ketanwan</p>
                                 <a href="#">Lihat</a> 
                              </div>
                           </div>
                        </div>
                        <!--Item End--> 
                        
                     </div>
                  </div>
                  <!--Widget End--> 
                 
               </div>
            </div>
            <!--Sidebar End--> 
         </div>
      </div>
   </div>
</section>
<!--Blog End--> 
    
@endsection