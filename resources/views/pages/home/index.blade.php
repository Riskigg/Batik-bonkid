@extends('layouts.front')

@section('content')
<div id="breadcrumb-header">
   <h1 class="title">List Produk</h1>
 </div>

 <div id="contentWhite">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index.html">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">List Produk</li>
           </ol>
         </nav>
       </div>
       @foreach ($products as $item)
       <div class="col-md-3 col-6">
         <div class="card cardProduk">
           <img src="{{ asset('uploads/'.$item->image) }}" class="card-img-top" alt="{{ $item->name }}">
           <div class="card-body">
             <a href="user-detail-produk.html" class="mt-0">{{ $item->name }}</a>
             <p class="text-danger priceShow">{{ $item->price }}</p>
             <a href="keranjang.html" type="button" class="btn btn-outline-danger text-danger br10">Add to cart</a>
           </div>
         </div>
       </div>
       @endforeach
       
       </div>
     </div>
     {{-- @if ($search)
                            {{ $doexam->appends(['name' => $name,'school' => $school,'date' => $date,'status' => $status])->links() }}
                        @else
                            {{ $doexam->links() }}
                        @endif --}}
     @if ($products->hasPages())
        <nav aria-label="Page navigation example" class="pagination-produk mt-4">
          <ul class="pagination justify-content-center">
              {{-- Previous Page Link --}}
              @if ($products->onFirstPage())
                    {{-- <li class="page-item"><a class="page-link disabled" href="#"><i class="fas fa-angle-left"></i></a></li> --}}
              @else
                    <li class="page-item"><a class="page-link" href="{{ ($search) ? $products->previousPageUrl().'&keyword='.$keyword : $products->previousPageUrl()  }}" rel="prev"><i class="fas fa-angle-left"></i></a></li>
              @endif
              {{-- Pagination Elements --}}
              @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    @if ($page == $products->currentPage())
                        <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a><span></span></li>
                    @else
                        <li class="page-item"><a href="{{ ($search) ? $url.'&keyword='.$keyword : $url  }}" class="page-link">{{ $page }}</a></li>
                    @endif
              @endforeach
              {{-- Next Page Link --}}
              @if ($products->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ ($search) ? $products->nextPageUrl().'&keyword='.$keyword : $products->nextPageUrl()  }}" aria-label="Next" rel="next"><i class="fas fa-angle-right"></i> </a></li>
              @else
                    {{-- <li class="page-item"><a class="page-link disabled" href="#"><i class="fas fa-angle-right"></i></a></li> --}}
              @endif
            </ul>
          </nav>
      @endif
     

   </div>
 </div>
    
@endsection