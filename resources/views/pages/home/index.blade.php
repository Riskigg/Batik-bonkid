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
             <button href="breadcrumb-header" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" type="button" class="add-to-cart btn btn-outline-danger text-danger br10">Add to cart</button>
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
 <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Shoping Cart</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label>Nama Pemesan :</label>
                          <input id="nama" name="nama" type="text" class="form-control" placeholder="Masukkan Nama Pemesan" name="nama_pemesan" required>
                      </div>
                      <div class="form-group">
                          <label>Alamat :</label>
                          <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat Pemesan" name="nama_pemesan" required>
                      </div>
                      <div class="form-group">
                          <label>No. HP :</label>
                          <input id="nohp" name="nohp" type="text" class="form-control" placeholder="Masukkan No. HP Pemesan" name="nama_pemesan" required>
                      </div>
                  </div>
                  <div class="col">
                      <table class="show-cart table">
                      </table>
                      <div>Total Harga: Rp.<span class="total-cart"></span></div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <a href="#" class="clear-cart btn btn-secondary">Clear Cart</a>
              <button type="submit" id="btnOrder" class="btn btn-primary" onclick="window.open(pemesanan(),'_blank')">Order now</button>
          </div>
      </div>
  </div>
</div>
<a data-toggle="modal" href="#cart" class="float" style="text-decoration: none;">
  <span class="myOrder"><span class="total-count"></span></span>
  <i class="fa fa-shopping-cart my-float"></i>
</a>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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
            var url = 'https://wa.me/{{ substr("891239123" ,1)}}?text=Hallo,%20Saya%20mau%20order %0a Nama :' + nama + ' %0a Alamat :' + alamat + ' %0a No. Hp : ' + nohp + ' %0a ' + resultCart + '%0a Total :%20%20%20%20%20%20%20%20%20%20%20%20' + 'Rp.' + formatNumber(shoppingCart.totalCart()) ;
            return url;
        }

        $(document).ready(function() {
            $('#btnOrder').on('click', function() {
                var nama = $('#nama').val();
                var alamat = $('#alamat').val();
                var nohp = $('#nohp').val();
                var totalBayar = shoppingCart.totalCart();
                if (nama != "" && alamat != "" && nohp != "" && totalBayar != 0) {
                    $("#btnOrder").attr("disabled", "disabled");
                    $.ajax({
                        url: "{{ route('index') }}",
                        type: "POST",
                        data: {
                            type: 1,
                            nama: nama,
                            alamat: alamat,
                            nohp: nohp,
                            totalBayar: totalBayar
                        },
                        cache: false,
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#btnOrder").removeAttr("disabled");
                                shoppingCart.clearCart()
                                // $('#orderForm').find('input:text').val('');
                                // $("#success").show();
                                // $('#success').html('Data added successfully !');
                            } else if (dataResult.statusCode == 201) {
                                alert("Error occured !");
                            }
                        }
                    });
                } else {
                    alert('Silahkan lengkapi data terlebih dahulu.');
                }
            });
        });

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
                    "<input type='number' class='item-count form-control' data-id='" + cartArray[i].id + "' value='" + cartArray[i].count + "'>" +
                    "<button class='plus-item btn btn-primary input-group-addon' data-id=" + cartArray[i].id + ">+</button></div></td>" +
                    "<!--<td><button class='delete-item btn btn-danger' data-id=" + cartArray[i].id + ">X</button></td>-->" +
                    " = " +
                    "<!--<td>Rp." + formatNumber(cartArray[i].total) + "</td>-->" +
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
    
@endsection