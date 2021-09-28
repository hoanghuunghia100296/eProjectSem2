@extends('layouts.guest.home')

@section('content')

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(guest/img/bg-img/24.jpg);">
            <h2 style="font-family: 'PT Serif', serif;font-size: 60px;letter-spacing: 3px">Order History</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order History</li>
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
                        <table class="table  table-hover">
                            <thead
                                style="text-align: center;font-size:20px;font-family: 'PT Serif', serif;letter-spacing: 1.5px;word-spacing: 2px">
                                <tr>
                                    <th>STT</th>
                                    <th>Order Date</th>
                                    <th>Delivery Address</th>
                                    <th>Order Status</th>
                                    <th>Total Price</th>
                                    <th>Order Details</th>
                                </tr>
                            </thead>
                            <tbody style="font-family: 'PT Serif', serif;word-spacing: 2px">
                                <?php $stt = 1; ?>
                                @foreach ($orders as $o)
                                    <tr>
                                        <td style="text-align: center;line-height: 130px;font-size: 20px;width: 100px;">
                                            {{ $stt }}</td>
                                        <td
                                            style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                            {{ $o->OrderDate }}</td>
                                        <td class="text-center"
                                            style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                            {{ $o->DeliveryAddress }}</td>
                                        @if ($o->OrderStatus == 1)
                                            <td class="text-center"
                                                style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px;color: rgb(0, 162, 255)">
                                                <b>Processing</b>
                                            </td>
                                        @elseif($o->OrderStatus == 2)
                                            <td class="text-center"
                                                style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px;color: rgb(11, 218, 11)">
                                                <b>Delivery</b>
                                            </td>
                                        @elseif($o->OrderStatus == 3)
                                            <td class="text-center"
                                                style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                <b>Done</b>
                                            </td>
                                        @elseif($o->OrderStatus == 4)
                                            <td class="text-center"
                                                style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px;color: rgb(223, 39, 39)">
                                                <b>Cancel</b>
                                            </td>

                                        @endif
                                        <td class="text-center"
                                            style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                            ${{ $o->TotalPrice }}</td>
                                        <td class="text-center" style="width: 130px;line-height: 130px;"><button
                                                class="btn btn-primary" style="padding-left: 30px;padding-right:30px;"
                                                data-toggle="modal" data-target="#details{{ $o->OrderID }}">Order
                                                Details</button></td>
                                    </tr>
                                    <?php $stt++; ?>

                                @endforeach
                            </tbody>
                        </table>
                        @foreach ($orders as $o)
                            <!-- Modal for Add Cinema-->
                            <div class="modal fade" id="details{{ $o->OrderID }}" data-backdrop="static">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Order Details</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="javascript:void(0)">
                                            <div class="modal-body" style="font-family: 'PT Serif', serif;">
                                                <table class="table ">
                                                    <thead style="text-align: center;">
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Image</th>
                                                            <th>Product Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Telephone</th>
                                                            <th>Description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-family: 'PT Serif', serif;word-spacing: 2px">
                                                        <?php $total_money = 0;
                                                        $stt = 1; ?>
                                                        @foreach ($products[$o->OrderID] as $key => $value)
                                                            <tr>
                                                                <td
                                                                    style="text-align: center;line-height: 130px;font-size: 20px;width: 100px;">
                                                                    {{ $stt }}</td>
                                                                <td style="text-align: center;width: 150px;padding: 0"><img
                                                                        src="{{ $value->Image }}" alt=""
                                                                        style="width: 100%"> </td>
                                                                <td
                                                                    style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                                    {{ $value->ProductName }}</td>
                                                                <td
                                                                    style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                                    {{ $value->Quantity }}</td>
                                                                <td class="text-center"
                                                                    style="text-align: center;line-height: 130px;font-size: 18px;width: 150px;">
                                                                    ${{ $value->Price * $value->Quantity }}</td>
                                                                <td
                                                                    style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                                    {{ $o->Telephone }}</td>
                                                                <td
                                                                    style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                                    {{ $o->Description }}</td>

                                                            </tr>
                                                            <?php $stt++; ?>
                                                        @endforeach

                                                    </tbody>
                                                </table>


                                            </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
