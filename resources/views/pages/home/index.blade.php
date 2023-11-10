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
             <a href="#" class="mt-0">{{ $item->name }}</a>
             <p class="text-danger priceShow">Rp. {{ number_format($item->price) }}</p>
             <p>{{ $item->deskripsi }}</p>
             <div class="row">
                <div class="col-md-6 mb-2">
                    <button href="breadcrumb-header" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" type="button" class="add-to-cart btn-block btn-sm btn btn-outline-danger text-danger br10">Add to cart</button>
                </div>
                <div class="col-md-6">
                    <a href="https://wa.me/62{{ substr("087812265965" ,1)}}?text=Hallo,%20Saya%20mau%20tanya%20apakah%20produk%20{{ $item->name }}" target="_blank">
                        <button  class="btn btn-sm btn-block btn-outline-success br10">Chat</button>
                    </a>
                </div>
             </div>
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
<a data-toggle="modal" href="#cart" class="float" style="text-decoration: none;">
  <span class="myOrder"><span class="total-count"></span></span>
  <i class="fa fa-shopping-cart my-float"></i>
</a>
<div id="cart" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Shoping Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body (2/3) -->
            <div class="modal-body" id="serviceModalMultiStep">

                <!-- Progress Bar -->
                <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="4" style="width: 20%;">
                    </div>
                </div>

                <!-- Tab Steps-->
                <div class="navbar d-none">
                    <div class="navbar-inner">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#step1" data-toggle="tab" data-step="1">Keranjang</a>
                            </li>
                            <li>
                                <a href="#step2" data-toggle="tab" data-step="2">Data Pemesan</a>
                            </li>
                            <li>
                                
                                <a href="#step3" data-toggle="tab" data-step="3">Pembayaran</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{ route('order') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Tab 1 -->
                        <div class="tab-pane active" id="step1">
                            <h4>Keranjang</h4>
                            <table class="show-cart table">
                            </table>
                            <div>Total Harga: Rp.<span class="total-cart"></span></div>
                        </div>

                        <!-- Tab 2 -->
                        <div class="tab-pane" id="step2">
                            <h4>Data Pemesan</h4>
                            <div class="form-group">
                                <label>Nama Pemesan :</label>
                                <input id="nama" name="name" type="text" class="form-control input-cart" placeholder="Masukkan Nama Pemesan" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat :</label>
                                <input id="alamat" name="address" type="text" class="form-control input-cart" placeholder="Masukkan Alamat Pemesan" required>
                            </div>
                            <div class="form-group">
                                <label>No. HP :</label>
                                <input id="nohp" name="phone" type="text" class="form-control input-cart" placeholder="Masukkan No. HP Pemesan" required>
                            </div>
                        </div>

                        <div class="tab-pane" id="step3">
                            <h4>Informasi Tagihan</h4>
                            <hr>
                            <h6 class="text-center">Total Tagihan</h6>
                            <h2 class="text-center">
                                Rp.<span class="total-cart"></span>
                            </h2>
                            <hr>
                            <img src="{{ asset('images/qris.jpg') }}" class="img-fluid mt-2" alt="">
                            <button type="submit"  class="btn btn-success btn-block" onclick="window.open(pemesanan(),'_blank')">Konfirmasi Pembayaran</button>
                        </div>

                    </div>
                </form>

            </div>

            <!-- Modal Footer (3/3) -->
            <div class="modal-footer">
                <div class="right-footer">
                    <a class="btn btn-outline-danger back" href="#">Back</a>
                    <a class="btn btn-success next" disabled href="#">Next</a>
                </div>
                <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
                <!-- <button class="btn btn-primary">Save changes</button> -->
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        }

        function pemesanan() {
            var nama = document.getElementById("nama").value;
            var alamat = document.getElementById("alamat").value;
            var nohp = document.getElementById("nohp").value;
            var myCart = shoppingCart.listCart();
            var myJson = JSON.stringify(myCart);
            var resultCart = "";
            for (var c in myCart) {
                resultCart += '' + myCart[c].name + '%20%20%20%20%20%20%20%20' + myCart[c].count + 'x%20' + '(Rp.' + formatNumber(myCart[c].price) + ')%20%0a';
            }
            var url = 'https://wa.me/62{{ substr("087812265965" ,1)}}?text=Hallo,%20Saya%20mau%20konfirmasi pembayaran: %0a Nama :' + nama + ' %0a Alamat :' + alamat + ' %0a No. Hp : ' + nohp + ' %0a ' + resultCart + '%0a Total :%20%20%20%20%20%20%20%20%20%20%20%20' + 'Rp.' + formatNumber(shoppingCart.totalCart()) ;
            return url;
        }

        // $(document).ready(function() {
        //     $('#btnOrder').on('click', function() {
        //         var nama = $('#nama').val();
        //         var alamat = $('#alamat').val();
        //         var nohp = $('#nohp').val();
        //         var totalBayar = shoppingCart.totalCart();
        //         var myCart = shoppingCart.listCart();
        //         if (nama != "" && alamat != "" && nohp != "" && totalBayar != 0) {
        //             $("#btnOrder").attr("disabled", "disabled");
        //             $.ajax({
        //                 url: "{{ route('order') }}",
        //                 type: "POST",
        //                 data: {
        //                     "_token":"{{ csrf_token() }}",
        //                     nama: nama,
        //                     alamat: alamat,
        //                     nohp: nohp,
        //                     totalBayar: totalBayar,
        //                     myCart: myCart

        //                 },
        //                 cache: false,
        //                 success: function(dataResult) {
        //                     console.log()
        //                     var dataResult = JSON.parse(dataResult);
        //                     if (dataResult.statusCode == 200) {
        //                         $("#btnOrder").removeAttr("disabled");
        //                         shoppingCart.clearCart()
        //                         // $('#orderForm').find('input:text').val('');
        //                         // $("#success").show();
        //                         // $('#success').html('Data added successfully !');
        //                     } else if (dataResult.statusCode == 201) {
        //                         alert("Error occured !");
        //                     }
        //                 }
        //             });
        //         } else {
        //             alert('Silahkan lengkapi data terlebih dahulu.');
        //         }
        //     });
        // });

        // ************************************************

        // Shopping Cart API

        // ************************************************
        var shoppingCart = (function() {
            // =============================
            // Private methods and propeties
            // =============================
            cart = [];
            // Constructor
            function Item(id, name, price, count) {
                this.id = id;
                this.name = name;
                this.price = price;
                this.count = count;
            }

            // Save cart
            function saveCart() {
                sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
            }

            // Load cart
            function loadCart() {
                cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
            }
            if (sessionStorage.getItem("shoppingCart") != null) {
                loadCart();
            }


            // =============================
            // Public methods and propeties
            // =============================
            var obj = {};
            // Add to cart
            obj.addItemToCart = function(id, name, price, count) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart[item].count++;
                        saveCart();
                        return;
                    }
                }
                var item = new Item(id, name, price, count);
                cart.push(item);
                saveCart();
            }
            // Set count from item
            obj.setCountForItem = function(id, count) {
                for (var i in cart) {
                    if (cart[i].id === id) {
                        cart[i].count = count;
                        break;
                    }
                }
            };

            // Remove item from cart
            obj.removeItemFromCart = function(id) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart[item].count--;
                        if (cart[item].count === 0) {
                            cart.splice(item, 1);
                        }
                        break;
                    }
                }
                saveCart();
            }

            // Remove all items from cart
            obj.removeItemFromCartAll = function(id) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart.splice(item, 1);
                        break;
                    }
                }
                saveCart();
            }

            // Clear cart
            obj.clearCart = function() {
                cart = [];
                saveCart();
            }

            // Count cart 
            obj.totalCount = function() {
                var totalCount = 0;
                for (var item in cart) {
                    totalCount += cart[item].count;
                }
                return totalCount;
            }

            // Total cart
            obj.totalCart = function() {
                var totalCart = 0;
                for (var item in cart) {
                    totalCart += cart[item].price * cart[item].count;
                }
                return formatNumber(totalCart);
            }

            // List cart
            obj.listCart = function() {
                var cartCopy = [];
                for (i in cart) {
                    item = cart[i];
                    itemCopy = {};
                    for (p in item) {
                        itemCopy[p] = item[p];
                    }
                    itemCopy.total = Number(item.price * item.count).toFixed(2);
                    cartCopy.push(itemCopy)
                }
                return cartCopy;
            }
            return obj;
        })();

        // *****************************************
        // Triggers / Events
        // ***************************************** 
        // Add item
        $('.add-to-cart').click(function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var price = Number($(this).data('price'));
            shoppingCart.addItemToCart(id, name, price, 1);
            Swal.fire(
            'Berhasil!',
            'Menambahkan Produk Ke keranjang!',
            'success'
            )
            displayCart();
        });

        // Clear items
        $('.clear-cart').click(function() {
            shoppingCart.clearCart();
            displayCart();
        });

        function displayCart() {
            var cartArray = shoppingCart.listCart();
            var output = "";
            for (var i in cartArray) {
                output += "<tr>" +
                    "<td class='card-title'>" + cartArray[i].name + "<br/><span>(Rp." + formatNumber(cartArray[i].price) + ")</span></td>" +
                    "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-id=" + cartArray[i].id + ">-</button>" +
                    "<input name='qty[]' type='number' oninput='this.value = !!this.value && Math.abs(this.value) > 0 ? Math.abs(this.value) : null' min='1' class='item-count form-control' data-id='" + cartArray[i].id + "' value='" + cartArray[i].count + "'>" +
                    "<input name='product_id[]' type='hidden'  min='1' class='form-control' data-id='" + cartArray[i].id + "' value='" + cartArray[i].id + "'>" +
                    "<input name='price[]' type='hidden'  min='1' class='form-control' data-id='" + cartArray[i].id + "' value='" + cartArray[i].price + "'>" +
                    "<button class='plus-item btn btn-primary input-group-addon' data-id=" + cartArray[i].id + ">+</button></div></td>" +
                    "<!--<td><button class='delete-item btn btn-danger' data-id=" + cartArray[i].id + ">X</button></td>-->" +
                    " = " +
                    "<!--<td>Rp." + formatNumber(cartArray[i].total) + "</td>-->" +
                    "<input name='total' type='hidden'  min='1' class='form-control' value='" + cartArray[i].total + "'>" +
                    "</tr>";
            }
            $('.show-cart').html(output);
            $('.total-cart').html(shoppingCart.totalCart());
            $('.total-count').html(shoppingCart.totalCount());
        }

        // Delete item button
        $('.show-cart').on("click", ".delete-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.removeItemFromCartAll(id);
            displayCart();
        })

        // -1
        $('.show-cart').on("click", ".minus-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.removeItemFromCart(id);
            displayCart();
        })

        // +1
        $('.show-cart').on("click", ".plus-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.addItemToCart(id);
            displayCart();
            console.log(id);
        })

        // Item count input
        $('.show-cart').on("change", ".item-count", function(event) {
            var id = $(this).data('id');
            var count = Number($(this).val());
            shoppingCart.setCountForItem(id, count);
            displayCart();
        });

        displayCart();
        

    </script>
    <script>
        $(document).ready(function() {
            var nStep = 3;
            var firstTab = $(".tab-pane:first-child").attr("id");
            var prevTab = $(".tab-pane.active")
                .prev()
                .attr("id");
            var nextTab = $(".tab-pane.active")
                .next()
                .attr("id");
            var lastTab = $(".tab-pane:last-child").attr("id");

            $(".progress-bar").text("Step 1 of " + nStep);
            $(".back, .first").hide();

            $(".next").click(function() {
                
                var nextId = $(".tab-pane.active")
                .next()
                .attr("id");
                // var currentStep = nextId;
                // console.log(currentStep);
                var isValid = true;
                if (nextId=='step3') {
                    var curStep = $('#step2'),
                    curInputs = curStep.find("input[type='text'],input[type='url']");
                    console.log(curInputs);
                    $(".form-control").removeClass("is-invalid");
                    for(var i=0; i<curInputs.length; i++){
                        if (!curInputs[i].validity.valid){
                            isValid = false;
                            $(curInputs[i]).closest(".form-control").addClass("is-invalid");
                        }
                    }
                } 
 
                if (isValid){
                    $('[href="#' + nextId + '"]').tab("show");
                    $(".back, .first").css("display", "unset");
                    if (nextId == lastTab) {
                        $(".next").hide();
                    }
                }else{
                    $(".back, .first").css("display", "unset");
                    $('[href="#step2"]').tab("show");
                }
                


            });

            $(".back").click(function() {
                var backId = $(".tab-pane.active")
                    .prev()
                    .attr("id");
                // alert(backId);
                $('[href="#' + backId + '"]').tab("show");

                $(".next").css("display", "unset");
                if (backId === "step1") {
                    $(".back, .first").css("display", "none");
                }

                return false;
            });

            $(".nav-tabs li:first-child").click(function() {
                $(".back, .first").css("display", "none");
                $(".next").css("display", "unset");
            });

            $(".nav-tabs li:not(:first-child)").click(function() {
                $(".back, .first").css("display", "unset");
            });

            $(".nav-tabs li:last-child").click(function() {
                $(".next").css("display", "none");
            });

            $(".nav-tabs li:not(:last-child)").click(function() {
                $(".next").css("display", "unset");
            });

            $('a[data-toggle="tab"]').on("shown.bs.tab", function(e) {
                var step = $(e.target).data("step");
                var percent = parseInt(step) / nStep * 100;

                $(".progress-bar").css({ width: percent + "%" });
                $(".progress-bar").text("Step " + step + " of " + nStep);
            });

            $(".first").click(function() {
                $('[href="#' + firstTab + '"]').tab("show");
                $(".back, .first").css("display", "none");
                $(".next").css("display", "unset");
            });
        });

    </script>
    
    
@endsection
@section('head')
    <style>

    </style>
@endsection
