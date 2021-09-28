@extends('layouts.guest.home')

@section('content')
    <?php
    if (session()->get('userID')) {
        $checkLogin = 1;
    } else {
        $checkLogin = 0;
    }
    ?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(guest/img/bg-img/24.jpg);">
            <h2 style="font-family: 'PT Serif', serif;font-size: 60px;letter-spacing: 3px">Products</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                            <p>Showing {{ $startProduct }}–{{ $endProduct }} of {{ $totalProducts }} results</p>
                        </div>
                        <!-- Search by Terms -->
                        <div class="search_by_terms">
                            <form action="javascript:void(0);" class="form-inline">
                                <select class="custom-select widget-title" id="selectSort" style="width: 200px">
                                    @if ($sortID == 0)
                                        <option value="0">Sort by default</option>
                                        <option value="1">Sort by newest </option>
                                        <option value="2">Sort by price: low to high</option>
                                        <option value="3">Sort by price: high to low</option>
                                    @elseif ($sortID == 1)
                                        <option value="0">Sort by Popularity</option>
                                        <option value="1" selected>Sort by newest </option>
                                        <option value="2">Sort by price: low to high</option>
                                        <option value="3">Sort by price: high to low</option>
                                    @elseif ($sortID == 2)
                                        <option value="0">Sort by Popularity</option>
                                        <option value="1">Sort by newest </option>
                                        <option value="2" selected>Sort by price: low to high</option>
                                        <option value="3">Sort by price: high to low</option>
                                    @elseif ($sortID == 3)
                                        <option value="0">Sort by Popularity</option>
                                        <option value="1">Sort by newest </option>
                                        <option value="2">Sort by price: low to high</option>
                                        <option value="3" selected>Sort by price: high to low</option>
                                    @endif
                                </select>
                                @if ($seachName != null)
                                    <input type="text" id="inputSearchName" value="{{ $seachName }}"
                                        style="margin-left: 50px;margin-right: 20px;background-color: #f5f5f5; border: 1px solid #ebebeb;height: 40px;letter-spacing: 1.5px; width: 250px;padding-left:20px ">
                                @else
                                    <input type="text" id="inputSearchName" placeholder="Name....."
                                        style="margin-left: 50px;margin-right: 20px;background-color: #f5f5f5; border: 1px solid #ebebeb;height: 40px;letter-spacing: 1.5px; width: 250px;padding-left:20px ">
                                @endif

                                <input type="submit" value="Search" onclick="onClickSearchName();"
                                    style="padding: 0 10px;background-color: #f5f5f5; border: 1px solid #ebebeb;height: 40px;cursor: pointer;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">
                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-desc">
                                @if ($category != 0)
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="inputCategoryAll" value="0">
                                        <label class="custom-control-label" for="inputCategoryAll">All plants </label>
                                    </div>
                                    @foreach ($categories as $c)
                                        @if ($category == $c->CategoryID)
                                            <!-- Single Checkbox -->
                                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                                <input type="checkbox" checked class="custom-control-input"
                                                    id="inputCategory{{ $c->CategoryID }}" value="{{ $c->CategoryID }}">
                                                <label class="custom-control-label"
                                                    for="inputCategory{{ $c->CategoryID }}">{{ $c->CategoryName }}</label>
                                            </div>
                                        @else
                                            <!-- Single Checkbox -->
                                            <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="inputCategory{{ $c->CategoryID }}" value="{{ $c->CategoryID }}">
                                                <label class="custom-control-label"
                                                    for="inputCategory{{ $c->CategoryID }}">{{ $c->CategoryName }}</label>
                                            </div>
                                        @endif
                                    @endforeach

                                @else
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="inputCategoryAll" value="0"
                                            checked>
                                        <label class="custom-control-label" for="inputCategoryAll">All plants</label>
                                    </div>
                                    @foreach ($categories as $c)
                                        <!-- Single Checkbox -->
                                        <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                            <input type="checkbox" class="custom-control-input"
                                                id="inputCategory{{ $c->CategoryID }}" value="{{ $c->CategoryID }}">
                                            <label class="custom-control-label"
                                                for="inputCategory{{ $c->CategoryID }}">{{ $c->CategoryName }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget best-seller mb-50">
                            <h4 class="widget-title">Best Seller</h4>
                            <div class="widget-desc">

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="guest/img/bg-img/4.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Cactus Flower</a>
                                        <p>$10.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
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
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="guest/img/bg-img/34.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Recuerdos Plant</a>
                                        <p>$9.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row" id="ShowProduct">
                            @foreach ($products as $p)
                                <!-- Single Product Area -->
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-area mb-50">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <a href="./product-detail?id={{ $p->ProductID }}"><img
                                                    src="{{ $p->Image }}" alt="{{ $p->ProductName }}"></a>
                                            <!-- Product Tag -->
                                            <div class="product-tag">
                                                <a href="#">Hot</a>
                                            </div>
                                            <div class="product-meta d-flex">
                                                @if ($likeProducts != '0')
                                                    <?php $check = 0; ?>
                                                    @foreach ($likeProducts as $item)
                                                        @if ($item->ProductID == $p->ProductID && $item->Status == 1)
                                                            <a href="javascript:void(0)" class="wishlist-btn"
                                                                style="background: white" title="Product liked"
                                                                onclick="onClickLikeProduct({{ $p->ProductID }},{{ $checkLogin }})"><i
                                                                    class="icon_heart_alt" style="color: red"></i></a>
                                                            <?php $check = 1; ?>
                                                        @endif
                                                    @endforeach
                                                    @if ($check == 0)
                                                        <a href="javascript:void(0)" class="wishlist-btn"
                                                            title="Product liked"
                                                            onclick="onClickLikeProduct({{ $p->ProductID }},{{ $checkLogin }})"><i
                                                                class="icon_heart_alt"></i></a>
                                                    @endif
                                                @else
                                                    <a href="javascript:void(0)" class="wishlist-btn"
                                                        title="Product liked"
                                                        onclick="onClickLikeProduct({{ $p->ProductID }},{{ $checkLogin }})"><i
                                                            class="icon_heart_alt"></i></a>
                                                @endif

                                                <a href="javascript:void(0);" class="add-to-cart-btn "
                                                    onclick="onClickAddToCart({{ $p->ProductID }})"><span
                                                        class="span-add-to-cart">Add to cart</span><span
                                                        class="added">Item added</span><i
                                                        class="fa fa-shopping-cart"></i> <i class="fa fa-square"></i></a>
                                                <a href="javascript:void(0)" class="compare-btn"><i
                                                        class="arrow_left-right_alt"></i></a>
                                            </div>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">
                                            <a href="shop-details.html">
                                                <p>{{ $p->ProductName }}</p>
                                            </a>
                                            <h6>${{ $p->Price }}</h6>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination row" id="ShowPagination">
                                @if ($totalPages > 1)
                                    @if ($currentPage == 1)
                                        <li class="page-item disabled" style="cursor: not-allowed; opacity: 0.5;"><a
                                                class="page-link" style="width: 71px">Previous</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                onclick="onClickPagination({{ $currentPage - 1 }})"
                                                style="width: 71px">Previous</a></li>
                                    @endif
                                    @for ($i = 1; $i <= $totalPages; $i++)
                                        @if ($i == $currentPage)
                                            <li class="page-item "><a class="page-link"
                                                    style="border-color: #70c745;background-color: #70c745"
                                                    onclick="onClickPaginationpagination({{ $i }})">{{ $i }}</a>
                                            </li>
                                        @else
                                            <li class="page-item"><a class="page-link" style="margin-bottom: 20px"
                                                    onclick="onClickPagination({{ $i }})">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    @if ($currentPage == $totalPages)
                                        <li class="page-item disabled" style="cursor: not-allowed; opacity: 0.5;"
                                            id="btn-previous"><a class="page-link" style="width: 71px">Next</a></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                onclick="onClickPagination({{ $currentPage + 1 }})"
                                                style="width: 71px">Next</a></li>
                                    @endif
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->
    <script>
        $(document).ready(function() {
            // (1)
            $(".custom-control-input").click(function() {
                var paramName = getUrlParameter("name");
                if (paramName == null) {
                    if ($(this).val() == 0) {
                        window.location.href = "./products";
                    } else {
                        window.location.href = "./products?cate=" + $(this).val();
                    }
                } else {
                    if ($(this).val() == 0) {
                        window.location.href = "./products?name=" + paramName;
                    } else {
                        window.location.href = "./products?name=" + paramName + "&cate=" + $(this).val();
                    }
                }
            });
            //End (1)
            // (2)
            $("#selectSort").change(function() {
                var paramName = getUrlParameter("name");
                var paramCate = getUrlParameter("cate")
                if (paramName == null) {
                    if (paramCate == null) {
                        if ($(this).val() == 0) {
                            window.location.href = "./products";
                        } else {
                            window.location.href = "./products?sort=" + $(this).val();
                        }
                    } else {
                        if ($(this).val() == 0) {
                            window.location.href = "./products?cate=" + getUrlParameter('cate');
                        } else {
                            window.location.href = "./products?cate=" + getUrlParameter('cate') + "&sort=" +
                                $(this).val();
                        }
                    }
                } else {
                    if (paramCate == null) {
                        if ($(this).val() == 0) {
                            window.location.href = "./products?name=" + paramName;
                        } else {
                            window.location.href = "./products?name=" + paramName + "&sort=" + $(this)
                                .val();
                        }
                    } else {
                        if ($(this).val() == 0) {
                            window.location.href = "./products?name=" + paramName + "&cate=" +
                                getUrlParameter('cate');
                        } else {
                            window.location.href = "./products?name=" + paramName + "&cate=" +
                                getUrlParameter('cate') + "&sort=" + $(this).val();
                        }
                    }
                }
            });
            //End (2)
        });

        // Function support

        // Function 1
        function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
            return null;
        };
        // Function 2
        function onClickPagination(page) {
            var paramName = getUrlParameter("name");
            var paramCate = getUrlParameter("cate");
            var paramSort = getUrlParameter("sort");
            if (paramName == null) {
                if (paramCate == null && paramSort == null) {
                    window.location.href = "./products?page=" + page;
                }
                if (paramCate != null && paramSort == null) {
                    window.location.href = "./products?cate=" + paramCate + "&page=" + page;
                }
                if (paramCate == null && paramSort != null) {
                    window.location.href = "./products?sort=" + paramSort + "&page=" + page;
                }
                if (paramCate != null && paramSort != null) {
                    window.location.href = "./products?cate=" + paramCate + "&sort=" + paramSort + "&page=" + page;
                }
            } else {
                if (paramCate == null && paramSort == null) {
                    window.location.href = "./products?name=" + paramName + "&page=" + page;
                }
                if (paramCate != null && paramSort == null) {
                    window.location.href = "./products?name=" + paramName + "&cate=" + paramCate + "&page=" + page;
                }
                if (paramCate == null && paramSort != null) {
                    window.location.href = "./products?name=" + paramName + "&sort=" + paramSort + "&page=" + page;
                }
                if (paramCate != null && paramSort != null) {
                    window.location.href = "./products?name=" + paramName + "&cate=" + paramCate + "&sort=" + paramSort +
                        "&page=" + page;
                }
            }
        };
        // Function 3
        function onClickSearchName() {
            var searchName = $('#inputSearchName').val().trim();
            if (searchName.length == 0) {
                $('#inputSearchName')[0].setCustomValidity('Enter name...');
            } else {
                window.location.href = "./products?name=" + searchName;
            }
        };

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
                            "Product is sent Add To Cart. You can check in cart page. Let's choose more products!"
                            );
                        $('#liCart').html(
                            '<a href="./cart"><i class="fa fa-shopping-cart" aria-hidden="true" style="color: yellow;font-size: 20px"></i>' +
                            '<span style="color: yellow">&ensp;Cart <sup style="color: yellow;padding: 3px;">' +
                            response + '</sup></span>' +
                            '</a>');
                    }
                });
            }, 2000);

        }

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
    </script>
@endsection
