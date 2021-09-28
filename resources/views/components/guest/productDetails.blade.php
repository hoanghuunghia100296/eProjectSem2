@extends('layouts.guest.home')

@section('content')

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(guest/img/bg-img/24.jpg);">
            <h2 style="font-family: 'PT Serif', serif;font-size: 60px;letter-spacing: 3px">Product Details</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" style="padding: 20px">
                                        <a class="product-img" href="{{ $product->Image }}" title="Product Image">
                                            <img class="d-block"
                                                style="width: 90%;margin: auto;box-shadow: 3px 3px 20px rgb(218, 215, 215)"
                                                src="{{ $product->Image }}" alt="1">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc" style="padding: 20px">
                            <h4 class="title">{{ $product->ProductName }}</h4>
                            <h4 class="price">${{ $product->Price }}</h4>
                            <div class="short_overview">
                                <p>{{ $product->Information }}</p>
                            </div>

                            <div class="cart--area d-flex flex-wrap align-items-center">
                                <!-- Add to Cart Form -->
                                <form class="cart clearfix d-flex align-items-center" action="javascript:void(0);">
                                    <div class="quantity">
                                        <span class="qty-minus"
                                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="5"
                                            name="quantity" value="1">
                                        <span class="qty-plus"
                                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &lt; 5) effect.value++;return false;"><i
                                                class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                    <button name="addtocart" value="5" class="btn alazea-btn ml-15"
                                        onclick="onClickAddToCart({{ $product->ProductID }})">Add to cart</button>
                                </form>
                                <!-- Wishlist & Compare -->
                                <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                    <a href="#" class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>
                                    <a href="#" class="compare-btn ml-15"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>

                            <div class="products--meta">
                                <p><span>Category:</span> <span>{{ $product->CategoryName }}</span></p>
                                <p>
                                    <span>Share on:</span>
                                    <span>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Related Product Area Start ##### -->
    <div class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-100">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="shop-details.html"><img src="guest/img/bg-img/40.png" alt=""></a>
                            <!-- Product Tag -->
                            <div class="product-tag">
                                <a href="#">Hot</a>
                            </div>
                            <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Cactus Flower</p>
                            </a>
                            <h6>$10.99</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-100">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="shop-details.html"><img src="guest/img/bg-img/41.png" alt=""></a>
                            <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Cactus Flower</p>
                            </a>
                            <h6>$10.99</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-100">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="shop-details.html"><img src="guest/img/bg-img/42.png" alt=""></a>
                            <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Cactus Flower</p>
                            </a>
                            <h6>$10.99</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-product-area mb-100">
                        <!-- Product Image -->
                        <div class="product-img">
                            <a href="shop-details.html"><img src="guest/img/bg-img/43.png" alt=""></a>
                            <!-- Product Tag -->
                            <div class="product-tag sale-tag">
                                <a href="#">Hot</a>
                            </div>
                            <div class="product-meta d-flex">
                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="product-info mt-15 text-center">
                            <a href="shop-details.html">
                                <p>Cactus Flower</p>
                            </a>
                            <h6>$10.99</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Related Product Area End ##### -->
    <script>
        function onClickAddToCart(productID) {
            var quantity = $('#qty').val();
            setTimeout(function() {
                $.ajax({
                    url: './add-to-cart',
                    type: 'get',
                    dataType: 'text',
                    data: { // Danh sách các thuộc tính sẽ gửi đi
                        ProductID: productID,
                        Quantity: quantity
                    },
                    success: function(response) {
                        alert(
                            "Product is sent Add To Cart. You can check in cart page. Let's choose more products!");
                        $('#liCart').html(
                            '<a href="./cart"><i class="fa fa-shopping-cart" aria-hidden="true" style="color: yellow;font-size: 20px"></i>' +
                            '<span style="color: yellow">&ensp;Cart <sup style="color: yellow;padding: 3px;">' +
                            response + '</sup></span>' +
                            '</a>');
                    }
                });
            }, 1500);
        }
    </script>
@endsection
