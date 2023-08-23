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
       <div class="col-lg-3 col-md-6">
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

     <nav aria-label="Page navigation example" class="pagination-produk mt-4">
       <ul class="pagination justify-content-center">
           <li class="page-item active">
             <span class="page-link">
               1
               <span class="sr-only">(current)</span>
             </span>
           </li>
           <li class="page-item"><a class="page-link" href="#">2</a></li>
           <li class="page-item"><a class="page-link" href="#">3</a></li>
           <li class="page-item">
             <a class="page-link" href="#">Next</a>
           </li>
       </ul>
     </nav>

   </div>
 </div>
    
@endsection