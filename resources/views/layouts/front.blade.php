<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="canonical" href="{{ url()->current() }}" />
      <meta property="bb:client_area" content="{{ url()->current() }}">
      <meta property="og:url" content="{{ url()->current() }}" />
      <title>{{ @$page_title ? $page_title : $meta['title'] }}</title>
      <meta name="twitter:title" content="{{ @$meta_title ? $meta_title : $meta['title'] }}" />
      <meta property="og:title" content="{{ @$meta_title ? $meta_title : $meta['title'] }}" />
      <meta name="description" content="{{ @$meta_description ? $meta_description : $meta['description'] }}" />
      <meta property="og:description" content="{{ @$meta_description ? $meta_description : $meta['description'] }}" />
      <meta name="twitter:description" content="{{ @$meta_description ? $meta_description : $meta['description'] }}" />
      <meta itemprop="description" content="{{ @$meta_description ? $meta_description : $meta['description'] }}">
      <meta name="robots" content="index, follow, noodp">
      <meta name="keywords" content="{{ @$meta_keyword ? $meta_keyword : $meta['keyword'] }}"/>
      <meta property="og:site_name" content="{{ @$meta_site ? $meta_site : $meta['site'] }}" />
      <meta name="twitter:site" content="{{ @$meta_twitter ? $meta_twitter : $meta['twitter'] }}" />
      <meta property="og:locale" content="id_ID" />
      <meta property="og:type" content="website" />
      <meta name="twitter:card" content="summary" />
      <meta property="og:image" content="{{ @$meta_image ? $meta_image : $meta['image'] }}" />
      <meta name="twitter:image" content="{{ @$meta_image ? $meta_image : $meta['image'] }}" />
      <link rel="icon" href="{{ asset('images/logo-bonkid-simple.png') }}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,800;1,800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <script src="https://kit.fontawesome.com/d5d4e0cbd7.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
      <!-- CSS FILES End -->
      @yield('head')

   </head>
   <body>
      <div class="displayNavbarTop">
         <div class="container p-0">
           <nav class="navbar navbar-expand-md">
             <a class="navbar-brand" href="index.html"><img class="img-fluid" src="{{ asset('images/logo-bonkid.png') }}" alt="logo afn group"></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fas fa-bars"></i>
             </button>
             <div class="collapse navbar-collapse" id="navbarText">
               <ul class="navbar-nav mr-auto">
                 <li class="nav-item d-none d-md-block">
                   <a class="nav-link" href="#"><i class="fas fa-phone"></i> 08331-3456-9879</a>
                 </li>
               </ul>
               <ul class="navbar-nav ml-auto">
                 <li class="nav-item active">
                   <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                 </li>
                 <li class="nav-item ">
                   <a class="nav-link" href="{{ route('products') }}">Produk</a>
                 </li>
                 <li class="nav-item ">
                   <a class="nav-link" href="{{ route('login') }}">Login</a>
                 </li>
               </ul>
               <div class="d-md-none d-sm-block mb-3">
                 <form class="form-inline my-lg-0">
                   <input class="form-control mr-sm-2 br10" type="search" placeholder="Kamu mau cari apa hari ini?" aria-label="Search">
                 </form>
                 <a href="keranjang.html">
                   <div class="cart">
                     <span class="count">10</span>
                     <i class="fas fa-shopping-bag material-icons"></i>
                   </div>
                 </a>
                 
                 
               </div>
             </div>
           </nav>
         </div>
       </div>
       <!-- navbar bottom -->
       <div class="container displayNavbarBottom">
           <nav class="navbarBottom">
             <div class="logo">
               <img class="img-fluid" src="{{ asset('images/logo-bonkid.png') }}" alt="logo afn group">
             </div>
             <div class="item search right" tabindex="0">
               <div class="search-group">
                 <input type="text" placeholder="Kamu mau cari apa hari ini?"><i class="fas fa-search material-icons search-icon"></i>
               </div>
             </div>
     
             <a href="keranjang.html" class="item">
               <div class="group">
                 <div class="cart">
                   <span class="count">10</span>
                   <i class="fas fa-shopping-bag material-icons"></i>
                 </div>
               </div>
             </a>
             
           </nav>
       </div>
         <!--Header End--> 
         @yield('content')
          <!--Footer Start-->
          
        
          <div class="footer">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  Copyright © 2023 Bonkid. All Right Reserved
                </div>
              </div>
            </div>
          </div>
        
        <!-- javascript -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://sevenpion.co.id/assets/owl/owl.carousel.min.js"></script>
        <script>
          $(document).ready(function() {
            $('.clients').owlCarousel({
              loop: true,
              margin: 10,
              nav: false,
              dots: false,
              autoplay:false,
              responsive: {
                0: {
                  items: 2
                },
                600: {
                  items: 3
                },
                1000: {
                  items: 5
                }
              }
            });
          });
        </script>
        <script>
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
          document.getElementById("myDropdownBottom").classList.toggle("show");
        }
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
        </script>
      @yield('scripts')
   </body>
</html>


  