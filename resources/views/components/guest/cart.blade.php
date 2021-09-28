@extends('layouts.guest.home')
{{-- {{   dd(Session::all())}} --}}

@section('content')
    <?php
    if (session()->get('cart')) {
        $cart = session()->get('cart');
    } else {
        $cart = [];
    }
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
            <h2 style="font-family: 'PT Serif', serif;font-size: 60px;letter-spacing: 3px">Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="view_cart">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead
                                style="text-align: center;font-size:20px;font-family: 'PT Serif', serif;letter-spacing: 1.5px;word-spacing: 2px">
                                <tr>
                                    <th>STT</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody style="font-family: 'PT Serif', serif;word-spacing: 2px">
                                <?php $total_money = 0;
                                $stt = 1; ?>
                                @foreach ($cart as $key => $value)
                                    <?php
                                    $total_money += $value['price'] * $value['quantity'];
                                    ?>
                                    <tr>
                                        <td style="text-align: center;line-height: 130px;font-size: 20px;width: 100px;">
                                            {{ $stt }}</td>
                                        <td style="text-align: center;width: 150px;padding: 0"><img
                                                src="{{ $value['image'] }}" alt="" style="width: 100%"> </td>
                                        <td
                                            style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                            {{ $value['product_name'] }}</td>
                                        <td style="width: 200px;padding-top:65px">
                                            <form class="d-flex" action="./update-quantity-cart">
                                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                                <input type="number" min="0" value="<?php echo $value['quantity']; ?>" name="quantity"
                                                    style="width: 80px;text-align: right;padding-right: 10px">
                                                <button type="submit" class="btn"
                                                    style="width: 90px;margin-left: 10px;background-color: none;border: 0.5px solid black">Update</button>
                                            </form>
                                        </td>
                                        <td class="text-center"
                                            style="text-align: center;line-height: 130px;font-size: 18px;width: 150px;">
                                            ${{ $value['price'] * $value['quantity'] }}</td>
                                        <td class="text-center" style="width: 130px;line-height: 130px;"><button
                                                class="btn btn-danger" style="padding-left: 30px;padding-right:30px;"
                                                data-toggle="modal"
                                                data-target="#delete{{ $value['product_id'] }}">Delete</button></td>
                                    </tr>
                                    <?php $stt++; ?>
                                    {{-- Modal for Delete Item --}}
                                    <div class="modal fade" id="delete{{ $value['product_id'] }}" data-backdrop="static"
                                        tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h4 class="modal-title custom_align" id="Heading"
                                                        style="font-family: 'Great Vibes', cursive">Delete</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <div style="color: black;">
                                                        <b>
                                                            Are you sure you want to delete this Record?
                                                        </b>
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <button type="button" style="padding: 7px 16px" class="btn btn-danger"
                                                        onclick="location.href='./delete-cart?product_id=<?php echo $value['product_id']; ?>'">Yes</button>
                                                    <button type="button" style="padding: 7px 16px" class="btn btn-default"
                                                        data-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                @endforeach
                                <tr>
                                    <td colspan="2" style="text-align: center;line-height: 35px">Total Money</th>
                                    <td colspan="4" class="text-center" style="font-size: 25px;">$
                                        &ensp;<?php echo $total_money; ?></th>
                                </tr>
                                <tr>
                                    <th colspan="6" style="text-align: end">
                                        @if ($total_money == 0)
                                            <button class="btn btn-success" disabled
                                                style="opacity: 30%; margin-right: 30px;font-size:20px;font-family: 'PT Serif', serif;padding-left: 30px;padding-right:30px;">Order
                                                Cart</button>

                                        @else
                                            @if ($checkLogin == 1)
                                                <button class="btn btn-success"
                                                    style="margin-right: 30px;font-size:20px;font-family: 'PT Serif', serif;padding-left: 30px;padding-right:30px;"
                                                    data-toggle="modal" data-target="#orderProduct">Order Cart</button>
                                            @else
                                                <button class="btn btn-success"
                                                    style="margin-right: 30px;font-size:20px;font-family: 'PT Serif', serif;padding-left: 30px;padding-right:30px;"
                                                    onclick="onClickOrderCart({{ $checkLogin }});">Order Cart</button>
                                            @endif
                                        @endif

                                        <button class="btn btn-danger"
                                            style="margin-right: 30px;font-size:20px;font-family: 'PT Serif', serif;padding-left: 30px;padding-right:30px;"
                                            data-toggle="modal" data-target="#deleteAll">Delete Cart</button>
                                    </th>
                                </tr>
                                <!-- Modal for Add Cinema-->
                                <div class="modal fade" id="orderProduct" data-backdrop="static" tabindex="-1"
                                    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"
                                                    style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                                    &ensp;&ensp;&ensp; Order Cart</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="javascript:void(0)">
                                                <div class="modal-body" style="font-family: 'PT Serif', serif;">
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2">Delivery Address</label>
                                                        <input type="text" class="form-control" id="deliveryAddress">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2">Telephone</label>
                                                        <input type="text" class="form-control" id="telephone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2">Description</label>
                                                        <input type="text" class="form-control" id="description">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" id="btnEdit"
                                                        onclick="onClickBtnOrder({{ session()->get('userID') }},{{ $total_money }})">Order</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal for Delete Item --}}
                                <div class="modal fade" id="deleteAll" data-backdrop="static" tabindex="-1"
                                    role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h4 class="modal-title custom_align" id="Heading"
                                                    style="font-family: 'Great Vibes', cursive">Delete</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div style="color: black;">
                                                    <b>
                                                        Are you sure you want to delete this Record?
                                                    </b>
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" style="padding: 7px 16px" class="btn btn-danger"
                                                    onclick="location.href='./delete-all-cart'">Yes</button>
                                                <button type="button" style="padding: 7px 16px" class="btn btn-default"
                                                    data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onClickOrderCart(checkLogin) {
            if (checkLogin == 0) {
                alert("Please login account to order product!");
            } else {
                window.location.href = "./order-cart";
            }
        }

        function onClickBtnOrder(userID, totalMoney) {
            $('#deliveryAddress')[0].setCustomValidity('');
            $('#telephone')[0].setCustomValidity('');
            $('#description')[0].setCustomValidity('');
            var address = $('#deliveryAddress').val();
            var telephone = $('#telephone').val();
            var description = $('#description').val();
            var error = 0;
            if (address.length == 0) {
                $('#deliveryAddress')[0].setCustomValidity('Address cannot be blank');
                error += 1;
            }
            if (telephone.length == 0) {
                $('#telephone')[0].setCustomValidity('Telephone cannot be blank');
                error += 1;
            }
            if (telephone.match(/[A-Za-z]+/)) {
                $('#telephone')[0].setCustomValidity('Telephone cannot contain word');
                error += 1;
            }
            if (description.length == 0) {
                $('#description')[0].setCustomValidity('Description cannot be blank');
                error += 1;
            }
            if (error == 0) {

                $.ajax({
                    url: './order-cart',
                    type: 'get',
                    dataType: 'text',
                    data: { // Danh sách các thuộc tính sẽ gửi đi
                        deliAddress: address,
                        telephone: telephone,
                        description: description,
                        totalMoney: totalMoney
                    },
                    success: function(response) {
                        alert(response);
                        window.location.href = "";
                    }
                });
            }
        }
    </script>


@endsection
