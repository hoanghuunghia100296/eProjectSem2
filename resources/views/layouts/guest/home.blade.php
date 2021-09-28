<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>TheGioiCayKieng.net - Plants World</title>

    <!-- Favicon -->
    <link rel="icon" href="guest/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="guest/style.css">
    <link rel="stylesheet" href="guest/style2.css">

    {{-- import fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@0;1&display=swap" rel="stylesheet">

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="guest/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="guest/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="guest/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="guest/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="guest/js/active.js"></script>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="guest/img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="./" class="nav-brand"><img src="guest/img/core-img/logo3.png" alt=""
                                style="max-width: 300px"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span
                                        class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    {{-- <li><a href="about.html">About</a></li> --}}
                                    <li><a href="./about">About</a></li>
                                    <li><a href="./products">Products</a>
                                        <ul class="dropdown">
                                            <li><a href="./products?cate=1">Outdoor plants</a></li>
                                            <li><a href="./products?cate=2">Office plants</a></li>
                                            <li><a href="./products?cate=3">Potted</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="./contact">Contact</a></li>
                                    @if (session()->has('userID'))
                                        <li><a>Welcome</a>
                                            <ul class="dropdown">
                                                <li><a href="./account-information">Your Information</a></li>
                                                <li><a href="./order-history">Order history</a></li>
                                                <li><a href="./logout">Logout</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="./login"><i class="fa fa-user"
                                                    aria-hidden="true"></i><span>&ensp;Login</span></a></li>
                                    @endif

                                    @if (session()->has('cart') && count(session()->get('cart')) > 0)
                                        <li id="liCart"><a href="./cart"><i class="fa fa-shopping-cart"
                                                    aria-hidden="true" style="color: yellow;font-size: 20px"></i>
                                                <span style="color: yellow">&ensp;Cart <sup
                                                        style="color: yellow;padding: 3px;">{{ count(session()->get('cart')) }}</sup></span>
                                            </a></li>
                                    @else
                                        <li id="liCart"><a href="./cart"><i class="fa fa-shopping-cart"
                                                    aria-hidden="true" style="color: white;font-size: 20px"></i>
                                                <span>&ensp;Cart</span>
                                                <sup style="padding: 3px;">0</sup>
                                            </a></li>
                                    @endif
                                </ul>


                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search"
                                placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    <div id="content">
        @yield('content')
    </div>


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(guest/img/bg-img/3.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="#"><img src="guest/img/core-img/logo3.png" alt=""
                                        style="max-width: 200px;margin-top: -20px"></a>
                            </div>
                            <p style="margin-top: -20px">What good is getting your landscape in the mail if your plants
                                show up dead? We’ve got to admit, sending a tree in a box across the country is pretty
                                unorthodox. Thankfully, we’ve become experts at it. Because of our Arrive Alive
                                Guarantee, you can rest assured that your trees will get to you healthy and happy.</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <a style="cursor: pointer" href="./admin/login">
                            <h4 style="color: white">Login for Admin</h4>
                        </a>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>QUICK LINK</h5>
                            </div>
                            <nav class="widget-nav">
                                <ul>
                                    <li><a href="#">Purchase</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Payment</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Return</a></li>
                                    <li><a href="#">Advertise</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Policities</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BEST SELLER</h5>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="javascript:void(0)"><img src="guest/img/bg-img/4.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)">Cactus Flower</a>
                                    <p>$10.99</p>
                                </div>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <a href="shop-details.html"><img src="guest/img/bg-img/5.jpg" alt=""></a>
                                </div>
                                <div class="product-info">
                                    <a href="shop-details.html">Tulip Flower</a>
                                    <p>$11.99</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> 590 Cach Mang Thang Tam, Ho Chi Minh city, VietNam</p>
                                <p><span>Phone:</span> +84 931 721 638</p>
                                <p><span>Email:</span> nghiahhts2005003@fpt.edu.vn</p>
                                <p><span>Open hours:</span> Mon - Sun: 8 AM to 7 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        {{-- <div class="copywrite-text">
                            <p> <a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                        </div> --}}
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="./">Home</a></li>
                                    <li><a href="./about">About</a></li>
                                    <li><a href="./products">Products</a></li>
                                    <li><a href="./contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->


</body>
<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
<script src="guest/js/jquery/jquery-2.2.4.min.js"></script>

<!-- Popper js -->
<script src="guest/js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="guest/js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="guest/js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="guest/js/active.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {


        const cartButtons = document.querySelectorAll('.add-to-cart-btn');

        cartButtons.forEach(button => {

            button.addEventListener('click', cartClick);

        });

        function cartClick() {
            let button = this;
            var qtyCart = 0;
            button.classList.add('clicked');
            setTimeout(function() {
                button.classList.remove('clicked');
            }, 1900);
        }



    });
</script>

</html>
