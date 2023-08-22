<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  
    <!-- pemetaan duniawi -->
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="Kawasan Konservasi di Provinsi Kalimantan Selatan secara definitif berada di bawah pengelolaan Balai Konservasi Sumber Daya Alam Kalimantan Selatan (BKSDA Kalsel) sebanyak 10 (sepuluh) unit kawasan, yang terdiri dari 4 unit berfungsi Cagar Alam (CA), 3 unit berfungsi Taman Wisata Alam (TWA) dan 3 unit berfungsi Suaka Margasatwa (SM)" />
    <meta name="keywords" content="balai konservasi sumber daya alam kalimantan selatan"/>
    <meta property="bb:client_area" content="{{ url()->current() }}">
    <meta name="robots" content="index, follow, noodp">
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="balai konservasi sumber daya alam kalimantan selatan" />
    <meta property="og:description" content="Kawasan Konservasi di Provinsi Kalimantan Selatan secara definitif berada di bawah pengelolaan Balai Konservasi Sumber Daya Alam Kalimantan Selatan (BKSDA Kalsel) sebanyak 10 (sepuluh) unit kawasan, yang terdiri dari 4 unit berfungsi Cagar Alam (CA), 3 unit berfungsi Taman Wisata Alam (TWA) dan 3 unit berfungsi Suaka Margasatwa (SM)" />
    <meta property="og:image" content="{{ asset('images/logo-bksda-kalsel-icon.png') }}" />
    <meta property="og:site_name" content="Kartunikah" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@bksdakalsel" />
    <meta name="twitter:title" content="balai konservasi sumber daya alam kalimantan selatan" />
    <meta name="twitter:description" content="Kawasan Konservasi di Provinsi Kalimantan Selatan secara definitif berada di bawah pengelolaan Balai Konservasi Sumber Daya Alam Kalimantan Selatan (BKSDA Kalsel) sebanyak 10 (sepuluh) unit kawasan, yang terdiri dari 4 unit berfungsi Cagar Alam (CA), 3 unit berfungsi Taman Wisata Alam (TWA) dan 3 unit berfungsi Suaka Margasatwa (SM)" />
    <meta name="twitter:image" content="{{ asset('images/logo-bksda-kalsel-icon.png') }}" />
    <meta itemprop="description" content="Kawasan Konservasi di Provinsi Kalimantan Selatan secara definitif berada di bawah pengelolaan Balai Konservasi Sumber Daya Alam Kalimantan Selatan (BKSDA Kalsel) sebanyak 10 (sepuluh) unit kawasan, yang terdiri dari 4 unit berfungsi Cagar Alam (CA), 3 unit berfungsi Taman Wisata Alam (TWA) dan 3 unit berfungsi Suaka Margasatwa (SM)">
  
    <!-- perkodingan duniawi -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://kartunikah.com/assets/css/style2023.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="
    sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,200;1,300;1,600&family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-bksda-kalsel-icon.png') }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        }

        body {
        font-family: Raleway;
        background-color: #202125;
        }

        .heading {
            text-align: center;
            font-size: 2.0em;
            letter-spacing: 1px;
            padding: 40px;
            color: white;
        }

        .gallery-image {
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        }

        .gallery-image img {
        height: 250px;
        width: 350px;
        transform: scale(1.0);
        transition: transform 0.4s ease;
        }

        .img-box {
        box-sizing: content-box;
        margin: 10px;
        height: 250px;
        width: 350px;
        overflow: hidden;
        display: inline-block;
        color: white;
        position: relative;
        background-color: white;
        }

        .caption {
        position: absolute;
        bottom: 5px;
        left: 20px;
        opacity: 0.0;
        transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .transparent-box {
        height: 250px;
        width: 350px;
        background-color:rgba(0, 0, 0, 0);
        position: absolute;
        top: 0;
        left: 0;
        transition: background-color 0.3s ease;
        }

        .img-box:hover img { 
        transform: scale(1.1);
        }

        .img-box:hover .transparent-box {
        background-color:rgba(0, 0, 0, 0.5);
        }

        .img-box:hover .caption {
        transform: translateY(-20px);
        opacity: 1.0;
        }

        .img-box:hover {
        cursor: pointer;
        }

        .caption > p:nth-child(2) {
        font-size: 0.8em;
        }

        .opacity-low {
        opacity: 0.5;
        }
        a:hover {
            color: white;
            text-decoration: none;
        }
    </style>
  
    <title>BKSDA Kalimantan Selatan</title>
</head>
<body>
    <h1 class="heading">Balai Konservasi Sumber Daya Alam <br> Kalimantan Selatan</h1>
    <h2 class="heading"></h2>
    <div class="gallery-image">
        <div class="img-box">
            <a href="{{ url('tema-1/index') }}">
                <img src="{{ asset('images/tema-1.png') }}" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                    <p>Tema 1</p>
                    <p class="opacity-low">Bekantan</p>
                    </div>
                </div> 
            </a>
        </div>
        <div class="img-box">
            <a href="{{ url('tema-2/index') }}" >
                <img src="{{ asset('images/tema-2.png') }}" alt="" />
                <div class="transparent-box">
                    <div class="caption">
                    <p>Tema 2</p>
                    <p class="opacity-low">Konservasi</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>
</html>