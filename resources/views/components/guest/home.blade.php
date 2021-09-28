@extends('layouts.guest.home')

@section('content')
    <?php
    if (session()->get('userID')) {
        $checkLogin = 1;
    } else {
        $checkLogin = 0;
    }
    ?>
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(guest/img/bg-img/1.jpg);"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2 style="font-family: 'PT Serif', serif;font-size: 50px;letter-spacing: 3px">Live your
                                    life in full bloom!</h2>
                                <br><br>
                                <p style="font-family: 'PT Serif', serif;font-size: 15px;letter-spacing: 3px">Life happens
                                    out and indoors. Add colorful plants to your landscape, <br>shipped directly from our
                                    nursery to you!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Portfolio Area Start ##### -->
    <section class="alazea-portfolio-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR PORTFOLIO</h2>
                        <p>We devote all of our experience and efforts for creation</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alazea-portfolio-filter">
                        <div class="portfolio-filter">
                            <button class="btn active" data-filter="*">All</button>
                            <button class="btn" data-filter=".design">Coffee Design</button>
                            <button class="btn" data-filter=".garden">Garden</button>
                            <button class="btn" data-filter=".home-design">Home Design</button>
                            <button class="btn" data-filter=".office-design">Office Design</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row alazea-portfolio">

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design wow fadeInUp"
                    data-wow-delay="100ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(guest/img/bg-img/16.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="guest/img/bg-img/16.jpg"
                            class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 1">
                            <div class="port-hover-text">
                                <h3>Minimal Album Store</h3>
                                <h5>Portfolio Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden wow fadeInUp" data-wow-delay="200ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(guest/img/bg-img/17.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="guest/img/bg-img/17.jpg"
                            class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 2">
                            <div class="port-hover-text">
                                <h3>Minimal Album Store</h3>
                                <h5>Portfolio Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden design wow fadeInUp"
                    data-wow-delay="300ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(guest/img/bg-img/18.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="guest/img/bg-img/18.jpg"
                            class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 3">
                            <div class="port-hover-text">
                                <h3>Minimal Album Store</h3>
                                <h5>Portfolio Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden office-design wow fadeInUp"
                    data-wow-delay="400ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(guest/img/bg-img/19.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="guest/img/bg-img/19.jpg"
                            class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 4">
                            <div class="port-hover-text">
                                <h3>Minimal Album Store</h3>
                                <h5>Portfolio Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design office-design wow fadeInUp"
                    data-wow-delay="100ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(guest/img/bg-img/20.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="guest/img/bg-img/20.jpg"
                            class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 5">
                            <div class="port-hover-text">
                                <h3>Minimal Album Store</h3>
                                <h5>Portfolio Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item garden wow fadeInUp" data-wow-delay="200ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(guest/img/bg-img/21.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="guest/img/bg-img/21.jpg"
                            class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 6">
                            <div class="port-hover-text">
                                <h3>Minimal Album Store</h3>
                                <h5>Portfolio Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Single Portfolio Area -->
                <div class="col-12 col-lg-6 single_portfolio_item home-design wow fadeInUp" data-wow-delay="300ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(guest/img/bg-img/22.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="guest/img/bg-img/22.jpg"
                            class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio 7">
                            <div class="port-hover-text">
                                <h3>Minimal Album Store</h3>
                                <h5>Portfolio Plants</h5>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Portfolio Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
    <section class="testimonial-area section-padding-100" style="background: #f2f4f5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="guest/img/bg-img/13.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about TheGioiCayKieng.net</p>
                                        </div>
                                        <p>“TheGioiCayKieng.net is a pleasure to work with. Their ideas are creative, they
                                            came up with imaginative solutions to some tricky issues, their landscaping and
                                            planting contacts are equally excellent we have a beautiful but also manageable
                                            garden as a result. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Mr. Nick Jonas</h6>
                                            <p>CEO of Pacific RIM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="guest/img/bg-img/14.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about TheGioiCayKieng.net</p>
                                        </div>
                                        <p>“A heartfelt thank you for the absolutely gorgeous bouquets and arrangements!
                                            Everything was just beautiful. We appreciate you sharing your floral talents and
                                            making the wedding day so special. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Ms. Nazrul Islam</h6>
                                            <p>CEO of HALO</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="guest/img/bg-img/15.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about TheGioiCayKieng.net</p>
                                        </div>
                                        <p>“I cannot thank you enough for the amazing, beautiful, wonderful, stunning, and
                                            marvelous job you did on my floral arrangements. You were able to do exactly
                                            what I had envisioned, but even better than I had planned. Everything was
                                            stunning, and my flowers were freaking gorgeous. I kept saying throughout the
                                            night how much I loved them and how you did such an amazing job. Working with
                                            you was an absolute pleasure, and I am so thankful for everything. Seriously
                                            though, my bouquet was unreal. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Mr. Jonas Nick</h6>
                                            <p>CEO of NAVATECH</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonial Area End ##### -->

    <section class="new-arrivals-products-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NEW ARRIVALS</h2>
                        <p>We have the latest products, it must be excited for you</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($productNewArrival as $pna)
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="./product-detail?id={{ $pna->ProductID }}"><img src="{{ $pna->Image }}"
                                        alt=""></a>
                                <!-- Product Tag -->
                                <div class="product-tag">
                                    <a href="#">New</a>
                                </div>
                                <div class="product-meta d-flex">
                                    @if ($likeProducts != '0')
                                        <?php $check = 0; ?>
                                        @foreach ($likeProducts as $item)
                                            @if ($item->ProductID == $pna->ProductID && $item->Status == 1)
                                                <a href="javascript:void(0)" class="wishlist-btn"
                                                    style="background: white" title="Product liked"
                                                    onclick="onClickLikeProduct({{ $pna->ProductID }},{{ $checkLogin }})"><i
                                                        class="icon_heart_alt" style="color: red"></i></a>
                                                <?php $check = 1; ?>
                                            @endif
                                        @endforeach
                                        @if ($check == 0)
                                            <a href="javascript:void(0)" class="wishlist-btn" title="Product liked"
                                                onclick="onClickLikeProduct({{ $pna->ProductID }},{{ $checkLogin }})"><i
                                                    class="icon_heart_alt"></i></a>
                                        @endif
                                    @else
                                        <a href="javascript:void(0)" class="wishlist-btn" title="Product liked"
                                            onclick="onClickLikeProduct({{ $pna->ProductID }},{{ $checkLogin }})"><i
                                                class="icon_heart_alt"></i></a>
                                    @endif

                                    <a href="javascript:void(0);" class="add-to-cart-btn "
                                        onclick="onClickAddToCart({{ $pna->ProductID }})"><span
                                            class="span-add-to-cart">Add to cart</span><span class="added">Item
                                            added</span><i class="fa fa-shopping-cart"></i> <i
                                            class="fa fa-square"></i></a>
                                    <a href="javascript:void(0)" class="compare-btn"><i
                                            class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="shop-details.html">
                                    <p>{{ $pna->ProductName }}</p>
                                </a>
                                <h6>${{ $pna->Price }}</h6>
                            </div>
                        </div>
                    </div>

                @endforeach
                <div class="col-12 text-center">
                    <a href="./products?sort=1" class="btn alazea-btn">View All</a>
                </div>

            </div>
        </div>


        <!-- ##### Blog Area Start ##### -->
        <section class="alazea-blog-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2>LATEST NEWS</h2>
                            <p>The breaking news about Gardening &amp; House plants</p>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <!-- Single Blog Post Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-post mb-100">
                            <div class="post-thumbnail mb-30">
                                <a href="single-post.html"><img src="guest/img/bg-img/6.jpg" alt=""></a>
                            </div>
                            <div class="post-content">
                                <a href="single-post.html" class="post-title">
                                    <h5>Garden designers across the country forecast ideas shaping the gardening world in
                                        2018</h5>
                                </a>
                                <div class="post-meta">
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 20 Jun 2018</a>
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Alan Jackson</a>
                                </div>
                                <p class="post-excerpt">Integer luctus diam ac scerisque consectetur. Vimus ottawas nec
                                    lacus sit amet. Aenean interdus mid vitae.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-post mb-100">
                            <div class="post-thumbnail mb-30">
                                <a href="single-post.html"><img src="guest/img/bg-img/7.jpg" alt=""></a>
                            </div>
                            <div class="post-content">
                                <a href="single-post.html" class="post-title">
                                    <h5>2018 Midwest Tree and Shrub Conference: Resilient Plants for a Lasting Landscape
                                    </h5>
                                </a>
                                <div class="post-meta">
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 20 Jun 2018</a>
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Christina Aguilera</a>
                                </div>
                                <p class="post-excerpt">Integer luctus diam ac scerisque consectetur. Vimus ottawas nec
                                    lacus sit amet. Aenean interdus mid vitae.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Blog Post Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-blog-post mb-100">
                            <div class="post-thumbnail mb-30">
                                <a href="single-post.html"><img src="guest/img/bg-img/8.jpg" alt=""></a>
                            </div>
                            <div class="post-content">
                                <a href="single-post.html" class="post-title">
                                    <h5>The summer coming up, it’s time for both us and the flowers to soak up the sunshine
                                    </h5>
                                </a>
                                <div class="post-meta">
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 19 Jun 2018</a>
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Mason Jenkins</a>
                                </div>
                                <p class="post-excerpt">Integer luctus diam ac scerisque consectetur. Vimus ottawas nec
                                    lacus sit amet. Aenean interdus mid vitae.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ##### Blog Area End ##### -->

        <!-- ##### Subscribe Area Start ##### -->
        <section class="subscribe-newsletter-area" style="background-image: url(guest/img/bg-img/subscribe.png);">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-lg-5">
                        <!-- Section Heading -->
                        <div class="section-heading mb-0">
                            <h2>Join the Newsletter</h2>
                            <p>Subscribe to our newsletter and get 10% off your first purchase</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="subscribe-form">
                            <form action="#" method="get">
                                <input type="email" name="subscribe-email" id="subscribeEmail"
                                    placeholder="Enter your email">
                                <button type="submit" class="btn alazea-btn">SUBSCRIBE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subscribe Side Thumbnail -->
            <div class="subscribe-side-thumb wow fadeInUp" data-wow-delay="500ms">
                <img class="first-img" src="guest/img/core-img/leaf.png" alt="">
            </div>
        </section>
        <!-- ##### Subscribe Area End ##### -->

        <!-- ##### Contact Area Start ##### -->
        <section class="contact-area section-padding-100-0">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-lg-5">
                        <!-- Section Heading -->
                        <div class="section-heading">
                            <h2>GET IN TOUCH</h2>
                            <p>Send us a message, we will call back later</p>
                        </div>
                        <!-- Contact Form Area -->
                        <div class="contact-form-area mb-100">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contact-name"
                                                placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="contact-email"
                                                placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="contact-subject"
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" cols="30"
                                                rows="10" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <!-- Google Maps -->
                        <div class="map-area mb-100">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.279599656158!2d106.665931!3d10.7867926!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd2ecb62e0d050fe9!2zRlBUIEFwdGVjaCBIQ00gLSBI4buHIFRo4buRbmcgxJDDoG8gVOG6oW8gTOG6rXAgVHLDrG5oIFZpw6puIFF14buRYyBU4bq_IChTaW5jZSAxOTk5KQ!5e0!3m2!1svi!2s!4v1629702349654!5m2!1svi!2s"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Contact Area End ##### -->
        <script>
            function onClickLikeProduct(ProductID, checkLogin) {
                if (checkLogin == 1) {
                    $.ajax({
                        url: './like-product',
                        type: 'get',
                        dataType: 'text',
                        data: { // Danh sách các thuộc tính sẽ gửi đi
                            id: ProductID,
                        },
                        success: function(response) {
                            window.location.href = "";
                        }
                    });
                } else {
                    alert("Please login to like Product!");
                }
            }

            function onClickAddToCart(ProductID) {
                setTimeout(function() {
                    $.ajax({
                        url: './add-to-cart',
                        type: 'get',
                        dataType: 'text',
                        data: { // Danh sách các thuộc tính sẽ gửi đi
                            ProductID: ProductID,
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
                }, 2000);

            }
        </script>
    @endsection
