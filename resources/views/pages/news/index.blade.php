@extends('layouts.front')

@section('content')
<!--Inner Header Start-->
<section class="wf100 p100 inner-header" style="background: url({{ asset('front/banner/banner-breadcrumb.png') }})">
    <div class="container">
       <h1>Berita</h1>
    </div>
 </section>
 <!--Inner Header End--> 
 <!--Blog Start-->
 <section class="wf100 p80 blog">
    <div class="blog-grid-medium">
       <div class="container">
          <div class="row">
            @foreach ($news as $item)
            <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                    <div class="blog-thumb"> <a href="{{ route('news.detail', $item->slug) }}"><i class="fas fa-link"></i></a> <img src="{{ asset('uploads/'.$item->image) }}" alt=""> </div>
                    <div class="post-txt">
                        <h5><a href="{{ route('news.detail', $item->slug) }}">{{ $item->title }}</a></h5>
                        <p>{{ \Illuminate\Support\Str::limit($item->excerpt, $limit = 70, $end = '...') }}</p>
                    </div>
                    <ul class="post-meta">
                        <li> <a href="{{ route('news.detail', $item->slug) }}"><i class="fas fa-calendar-alt"></i> {{ date('d F Y', strtotime($item->published_at));}}</a> </li>
                    </ul>
                </div>
            </div>
            @endforeach
          </div>
         @if ($news->hasPages())
            <div class="gt-pagination">
               <ul class="pagination">
                  {{-- Previous Page Link --}}
                  @if ($news->onFirstPage())
                        {{-- <li class="page-item"><a class="page-link disabled" href="#"><i class="fas fa-angle-left"></i></a></li> --}}
                  @else
                        <li class="page-item"><a class="page-link" href="{{ $news->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-left"></i></a></li>
                  @endif
                  {{-- Pagination Elements --}}
                  @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                        @if ($page == $news->currentPage())
                           <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a><span></span></li>
                        @else
                           <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                  @endforeach
                  {{-- Next Page Link --}}
                  @if ($news->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $news->nextPageUrl() }}" aria-label="Next" rel="next"><i class="fas fa-angle-right"></i> </a></li>
                  @else
                        {{-- <li class="page-item"><a class="page-link disabled" href="#"><i class="fas fa-angle-right"></i></a></li> --}}
                  @endif
               </ul>
            </div>
         @endif
        
       </div>
    </div>
 </section>
 <!--Blog End--> 
    
@endsection