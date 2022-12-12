<!DOCTYPE html>
<html lang="en">

<head>
    @php
    $seo_setting = App\Models\Seo::find(1);
    @endphp
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta name="description" content="{!!$seo_setting->meta_description !!}">
    <meta name="author" content="{{ $seo_setting->meta_author }}">
    <meta name="keywords" content="{{ $seo_setting->meta_keyword }}">
    <script>
    {{$seo_setting->google_analytics}}
    </script>

    <meta name="robots" content="all">
    <title>@yield('title')</title>
    <!-- Flipmart Ecom Shop -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/images/star-big-on.png')}}">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css')}}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css')}}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.body.header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <!-- add to cart modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="product_name"></span></h5>
                    <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="p_image">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ml-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price:
                                    <strong class="text-danger">Rs.
                                        <span id="product_price"></span>
                                        <del id="old_price"></del>
                                    </strong>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="product_code"></strong></li>
                                <li class="list-group-item">Category: <strong id="category_name"></strong></li>
                                <li class="list-group-item">Brand: <strong id="brand_name"></strong></li>
                                <li class="list-group-item">Stock: <strong id="stock"></strong></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" id="colorArea">
                                <label for="color">Choose Color: </label>
                                <select class="form-control" id="color" name="product_color">
                                </select>
                            </div>
                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size: </label>
                                <select class="form-control" id="size" name="product_size">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quantity</label>
                                <input type="number" class="form-control" id="quantity" value="1" min="1">
                            </div>
                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end add to cart modal -->
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Start Product View With Modal
        function productView(id) {
            // alert(id);
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {

                    $("#product_name").text(data.product.product_name_en);
                    $("#selling_price").text(data.product.selling_price);
                    $("#product_code").text(data.product.product_code);
                    $("#p_image").attr('src', '/' + data.product.product_thumbnail);
                    $("#category_name").text(data.product.category.category_name_en);
                    $("#product_id").val(id);
                    $("#quantity").val(1);

                    $("#stock").text('');
                    if (data.product.product_qty > 0) {
                        $("#stock").append('<span class="badge badge-success" style="background-color: green;">Available</span>');
                    } else {
                        $("#stock").append('<span class="badge badge-danger" style="background-color: red;">Out of Stock</span>');
                    }

                    // Product Price after discount
                    $("#product_price").text('');
                    $("#old_price").text('');
                    if (data.product.discount_price == null || data.product.discount_price == 0) {
                        $("#product_price").text(data.product.selling_price);
                    } else {
                        $("#product_price").text(parseInt(data.product.selling_price) - parseInt(data.product.discount_price));
                        $("#old_price").text(data.product.selling_price);
                    }

                    // if brand_id is 0
                    if (data.product.brand_id != 0) {
                        $("#brand_name").text(data.product.brand.brand_name_en);
                    } else {
                        $("#brand_name").text('NA');
                    }

                    // for multiple choices first refresh and then load options
                    $('select[name="product_color"]').empty();
                    $.each(data.color, function(key, val) {
                        $('select[name="product_color"]').append('<option value="' + val + '">' + val + '</option>');
                        if (data.color == "") {
                            $("#colorArea").hide();
                        } else {
                            $("#colorArea").show();
                        }
                    });

                    $('select[name="product_size"]').empty();
                    $.each(data.size, function(key, val) {
                        $('select[name="product_size"]').append('<option value="' + val + '">' + val + '</option>');

                        if (data.size == "") {
                            $("#sizeArea").hide();
                        } else {
                            $("#sizeArea").show();
                        }
                    });
                },
                error: function(err) {
                    alert(err.message);
                }
            })
        }
        // End Product View With Modal

        //Start Add To Cart Product
        function addToCart() {
            var product_name = $("#product_name").text();
            var id = $("#product_id").val();
            var color = $("#color option:selected").text();
            var size = $("#size option:selected").text();
            var quantity = $("#quantity").val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart();

                    $('#closeModal').click();

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.success
                        });
                    }
                },
            })
        }
        //End Add To Cart Product
    </script>
    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(res) {
                    var miniCart = "";
                    $("span[id='cartSubTotal']").text(res.cart_total);
                    $("span[id='cartQty']").text(res.cart_qty);

                    $.each(res.carts, function(key, val) {
                        // loop through the template
                        miniCart += `<div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image"> <a href="#"><img src="/${val.options.image}" alt="${val.name}"></a> </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <h3 class="name"><a href="#">${val.name}</a></h3>
                                                <div class="price">Rs.${val.price} * ${val.qty}</div>
                                            </div>
                                            <div class="col-xs-1 action"> 
                                                <button type="button" class="" id="${val.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>`
                    });

                    $("#mini_cart").html(miniCart)
                }
            });
        }
        miniCart();

        // mini cart remove start
        function miniCartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/mini/cart/product/remove/' + id,
                dataType: 'json',
                success: function(data) {
                    miniCart();

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.success
                        });
                    }
                }
            })
        }
        // end mini cart remove
    </script>

    <!-- add to wishlist -->
    <script type="text/javascript">
        function addToWishlist(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,
                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        });
                    }
                },
                error: function(data) {

                }
            });
        }
    </script>
    <!-- end wishlish -->


    <!-- bring data from wishlist table and load it -->
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/my-wishlist/get-wishlist-product',
                dataType: 'json',
                success: function(res) {
                    var rows = "";

                    $.each(res, function(key, val) {
                        // loop through the response that come from controller
                        rows += `<tr>
                                    <td class="col-md-2"><img src="/${val.product.product_thumbnail}" alt="${val.product.product_name_en}"></td>
                                    <td class="col-md-7">
                                        <div class="product-name">
                                            <a href="#">${val.product.product_name_en}</a>
                                        </div>

                                        <div class="price">
                                        ${val.product.discount_price == null 
                                            ? 
                                            `Rs ${val.product.selling_price}`
                                            : 
                                            `Rs ${val.product.selling_price - val.product.discount_price}<span> ${val.product.selling_price}</span>`
                                        }
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <button id="${val.product.id}" onclick="productView(this.id)" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart">Add to cart</button>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" href="#" class="" id="${val.id}" onclick="removethisproduct(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`
                    });

                    $("#wishlist").html(rows)
                }
            });
        }
        wishlist();

        // remove wishlist
        function removethisproduct(id) {
            $.ajax({
                type: 'GET',
                url: '/remove/wishlist/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        });
                    }
                }
            })
        }
        // end wishlist remove
    </script>
    <!-- end bringing data -->

    <!-- bring data from cart package and load it -->
    <script type="text/javascript">
        function mycart() {
            $.ajax({
                type: 'GET',
                url: '/my-cart/get-mycart-product',
                dataType: 'json',
                success: function(res) {
                    var rows = "";

                    $.each(res.carts, function(key, val) {
                        // loop through the response that come from controller
                        rows += `<tr>
                                    <td class="col-md-2">
                                        <img src="/${val.options.image}" alt="${val.name}" style="width: 60px; height: 60px;">
                                    </td>
                                    <td class="col-md-2">
                                        <div class="product-name">
                                            <a href="#">${val.name}</a>
                                        </div>

                                        <div class="price">
                                        ${val.price}
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <strong>${val.options.size == null ? `NA` : val.options.size}</strong>
                                    </td>
                                    <td class="col-md-2">
                                        <span>${val.options.color == null ? `NA` : val.options.color}</span>
                                    </td>
                                    <td class="col-md-2">
                                        <button type="submit" class="btn btn-success btn-sm" id="${val.rowId}" onclick="cartIncrement(this.id)">+</button>
                                        <input type="text" value="${val.qty}" min="1" max="100" disabled="" style="width: 30%;">
                                        ${val.qty > 1 
                                            ?
                                            `<button type="submit" class="btn btn-danger btn-sm" id="${val.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                             : 
                                            `<button type="submit" class="btn btn-danger btn-sm" disabled>-</button>`
                                            }
                                    </td>
                                    <td class="col-md-2">
                                        <span> Rs.${val.subtotal}</span>
                                    </td>
                                    <td class="col-md-2 close-btn">
                                        <button type="submit" href="#" class="" id="${val.rowId}" onclick="removeCartProduct(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`
                    });

                    $("#mycart").html(rows)
                }
            });
        }
        mycart();

        // remove product from cart
        function removeCartProduct(id) {
            $.ajax({
                type: 'GET',
                url: '/remove/cart/product/' + id,
                dataType: 'json',
                success: function(data) {
                    couponCalculator();
                    mycart();
                    miniCart();
                    $("#couponField").show();
                    $("#coupon_code").val('');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        });
                    }
                }
            })
        }
        // end cart remove

        // cart product quantity increment
        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart/product/increment/' + rowId,
                dataType: 'json',
                success: function(res) {
                    couponCalculator();
                    miniCart();
                    mycart();
                }
            })
        }

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: '/cart/product/decrement/' + rowId,
                dataType: 'json',
                success: function(res) {
                    couponCalculator();
                    miniCart();
                    mycart();
                }
            })
        }
        // end increment
    </script>
    <!-- end cart data -->
    <!-- apply coupon start -->
    <script type="text/javascript">
        function applyCoupon() {
            var coupon_code = $("#coupon_code").val();

            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    coupon_code: coupon_code,
                },
                url: '{{ url("/apply/coupon")}}',
                success: function(res) {
                    couponCalculator();
                    if (res.success) {
                        $('#couponField').hide();
                    }

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(res.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: res.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: res.error
                        })
                    }
                },
            });
        }
    </script>
    <!-- end apply coupon -->
    <!-- coupon calculator -->
    <script type="text/javascript">
        function couponCalculator() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "{{ url('/coupon-calculator')}}",
                success: function(data) {
                    if (data.total) {
                        $("#couponCalcField").html(
                            `<tr>
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$ ${data.total}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$ ${data.total}</span>
                                </div>
                            </th>
                        </tr>`
                        );
                    } else {
                        $("#couponCalcField").html(
                            `<tr>
                            <th>
                                <div class="cart-sub-total">
                                    Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
                                </div>
                                <div class="cart-sub-total">
                                    Coupon<span class="inner-left-md">${data.coupon_name}</span>
                                    <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
                                </div>
                                <div class="cart-sub-total">
                                    Disc Amt.<span class="inner-left-md">- $ ${data.discount_amount}</span>
                                </div>
                                <div class="cart-grand-total">
                                    Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
                                </div>
                            </th>
                        </tr>`
                        );
                    }

                }
            })
        }

        couponCalculator();
    </script>

    <!-- end coupon calculator -->
    <script type="text/javascript">
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: '/coupon-remove',
                dataType: 'json',
                success: function(data) {
                    couponCalculator();
                    $('#couponField').show();
                    $("#coupon_code").val('');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        });
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        });
                    }
                }
            })
        }
    </script>

</body>

</html>