@extends('layouts.admin.home')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Order Detail </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Order Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    @if ($statusOrder == 1)
        <div class="container"
            style="margin-bottom: 30px;font-family: 'PT Serif', serif;word-spacing: 2px;letter-spacing: 1px ">
            <div class="row" style="margin-left: 20px;">
                <div class="col-10">
                    <h3 style="text-align: center;background: green;color: white;padding: 10px 0px">Change Processing to
                        Delivery</h3>
                </div>
                <div class="col-5" style="border-right: 1.5px solid black;padding-top:20px;font-size: 15px">
                    <h4 style="text-align: center">Before Confirm</h4>
                    <p><span style="font-weight: bold">OrderID:</span>&ensp;&ensp;<span>{{ $order->OrderID }}</span></p>
                    <p><span style="font-weight: bold">Customer Email:</span>&ensp;&ensp;<span>{{ $order->Email }}</span>
                    </p>
                    <p><span style="font-weight: bold">Telephone:</span>&ensp;&ensp;<span>{{ $order->Telephone }}</span></p>
                    <p><span style="font-weight: bold">Address:</span>&ensp;&ensp;<span>{{ $order->DeliveryAddress }}</span>
                    </p>
                    <p><span style="font-weight: bold">Description:</span>&ensp;&ensp;<span>{{ $order->Description }}</span>
                    </p>
                </div>
                <div class="col-5" style="padding-left: 20px;padding-top:20px;font-size: 15px">
                    <form action="javascript:void(0);">
                        <h4 style="text-align: center">After Confirm</h4>
                        <table style="width: 100%;font-family: 'PT Serif',serif">
                            <tr>
                                <div class="form-group">
                                    <td><label for="">Full name: <span style="color: red">*</span></label></td>
                                    <td><input type="text" id="confirmFullName" style="width: 100%"></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <td style="padding-top: 15px"><label for="">Telephone: <span
                                                style="color: red">*</span></label></td>
                                    <td style="padding-top: 15px"><input type="text" id="confirmTelephone"
                                            style="width: 100%"></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <td style="padding-top: 15px"><label for="">Address: <span
                                                style="color: red">*</span></label></td>
                                    <td style="padding-top: 15px"><input type="text" id="confirmAddress"
                                            style="width: 100%"></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <td style="padding-top: 15px"><label for="">Description:</label></td>
                                    <td style="padding-top: 15px"><textarea id="confirmDescription"
                                            style="width: 100%"></textarea></td>
                                </div>
                            </tr>
                            <tr style="text-align: center">
                                <div class="form-group">
                                    <td></td>
                                    <td style="padding-top: 15px;padding-bottom:15px">
                                        <button class="btn btn-primary" type="submit" style="width: 30%"
                                            onclick="onClickDelivery({{ $order->OrderID }})">Submit</button>
                                        <button class="btn btn-danger " style="width: 30%;margin-left: 10px"
                                            onclick="onClickCancel({{ $order->OrderID }})">Cancel</button>
                                    </td>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    @endif
    @if ($statusOrder == 2)
        <div class="container"
            style="margin-bottom: 30px;font-family: 'PT Serif', serif;word-spacing: 2px;letter-spacing: 1px ">
            <div class="row" style="margin-left: 20px;">
                <div class="col-11">
                    <h3 style="text-align: center;background: green;color: white;padding: 10px 0px">Change Delivery to Done
                    </h3>
                </div>
                <div class="col-3" style="border-right: 1.5px solid black;padding-top:20px;font-size: 15px">
                    <h4 style="text-align: center">Before Confirm</h4>
                    <p><span style="font-weight: bold">OrderID:</span>&ensp;&ensp;<span>{{ $order->OrderID }}</span></p>
                    <p><span style="font-weight: bold">Customer Email:</span>&ensp;&ensp;<span>{{ $order->Email }}</span>
                    </p>
                    <p><span style="font-weight: bold">Telephone:</span>&ensp;&ensp;<span>{{ $order->Telephone }}</span></p>
                    <p><span
                            style="font-weight: bold">Address:</span>&ensp;&ensp;<span>{{ $order->DeliveryAddress }}</span>
                    </p>
                    <p><span
                            style="font-weight: bold">Description:</span>&ensp;&ensp;<span>{{ $order->Description }}</span>
                    </p>
                </div>
                <div class="col-4"
                    style="padding-left: 20px;padding-top:20px;font-size: 15px;border-right: 1.5px solid black">
                    <h4 style="text-align: center">After Confirm</h4>
                    <p><span style="font-weight: bold">FullName
                            Received:</span>&ensp;&ensp;<span>{{ $order->FullNameAfterConfirm }}</span></p>
                    <p><span
                            style="font-weight: bold">Telephone:</span>&ensp;&ensp;<span>{{ $order->TelephoneAfterConfirm }}</span>
                    </p>
                    <p><span style="font-weight: bold">Delivery
                            Address:</span>&ensp;&ensp;<span>{{ $order->DeliveryAddressAfterConfirm }}</span></p>
                    <p><span
                            style="font-weight: bold">Description:</span>&ensp;&ensp;<span>{{ $order->DescriptionAfterConfirm }}</span>
                    </p>
                </div>
                <div class="col-4" style="padding-left: 20px;padding-top:20px;font-size: 15px">
                    <h4 style="text-align: center">Done</h4>
                    <form action="javascript:void(0);">
                        <table style="width: 100%;font-family: 'PT Serif',serif">
                            <tr>
                                <div class="form-group">
                                    <td style="padding-top: 15px"><label>Delivery Date:</label></td>
                                    <td style="padding-top: 15px"><input type="datetime-local" id="deliveryDate"
                                            style="width: 100%"></td>
                                </div>
                            </tr>
                            <tr style="text-align: center">
                                <div class="form-group">
                                    <td></td>
                                    <td style="padding-top: 15px;padding-bottom:15px">
                                        <button class="btn btn-primary" type="submit" style="width: 40%"
                                            onclick="onClickDone({{ $order->OrderID }})">Submit</button>
                                        <button class="btn btn-danger " style="width: 40%;margin-left: 10px"
                                            onclick="onClickCancel({{ $order->OrderID }})">Cancel</button>
                                    </td>
                                </div>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    @endif
    @if ($statusOrder == 3)
        <div class="container"
            style="margin-bottom: 30px;font-family: 'PT Serif', serif;word-spacing: 2px;letter-spacing: 1px ">
            <div class="row" style="margin-left: 20px;">
                <div class="col-11">
                    <h3 style="text-align: center;background: green;color: white;padding: 10px 0px">Done</h3>
                </div>
                <div class="col-4" style="border-right: 1.5px solid black;padding-top:20px;font-size: 15px">
                    <h4 style="text-align: center">Before Confirm</h4>
                    <p><span style="font-weight: bold">OrderID:</span>&ensp;&ensp;<span>{{ $order->OrderID }}</span></p>
                    <p><span style="font-weight: bold">Customer Email:</span>&ensp;&ensp;<span>{{ $order->Email }}</span>
                    </p>
                    <p><span style="font-weight: bold">Telephone:</span>&ensp;&ensp;<span>{{ $order->Telephone }}</span>
                    </p>
                    <p><span
                            style="font-weight: bold">Address:</span>&ensp;&ensp;<span>{{ $order->DeliveryAddress }}</span>
                    </p>
                    <p><span
                            style="font-weight: bold">Description:</span>&ensp;&ensp;<span>{{ $order->Description }}</span>
                    </p>
                </div>
                <div class="col-4"
                    style="padding-left: 20px;padding-top:20px;font-size: 15px;border-right: 1.5px solid black">
                    <h4 style="text-align: center">After Confirm</h4>
                    <p><span style="font-weight: bold">FullName
                            Received:</span>&ensp;&ensp;<span>{{ $order->FullNameAfterConfirm }}</span></p>
                    <p><span
                            style="font-weight: bold">Telephone:</span>&ensp;&ensp;<span>{{ $order->TelephoneAfterConfirm }}</span>
                    </p>
                    <p><span style="font-weight: bold">Delivery
                            Address:</span>&ensp;&ensp;<span>{{ $order->DeliveryAddressAfterConfirm }}</span></p>
                    <p><span
                            style="font-weight: bold">Description:</span>&ensp;&ensp;<span>{{ $order->DescriptionAfterConfirm }}</span>
                    </p>
                </div>
                <div class="col-3" style="padding-left: 20px;padding-top:20px;font-size: 15px">
                    <h4 style="text-align: center">Done</h4>
                    <p><span style="font-weight: bold">Delivery
                            Date:</span>&ensp;&ensp;<span>{{ $order->DeliveryDate }}</span></p>
                    <div class="d-flex">
                        <button class="btn btn-danger ml-auto"
                            onclick="onClickCancel({{ $order->OrderID }})">Cancel</button>

                    </div>
                </div>

            </div>
        </div>
    @endif
    @if ($statusOrder == 4)
        <div class="container"
            style="margin-bottom: 30px;font-family: 'PT Serif', serif;word-spacing: 2px;letter-spacing: 1px ">
            <div class="row" style="margin-left: 20px;">
                <div class="col-11">
                    <h3 style="text-align: center;background: rgb(185, 25, 25);color: white;padding: 10px 0px">Cancel</h3>
                </div>
                <div class="col-4" style="border-right: 1.5px solid black;padding-top:20px;font-size: 15px">
                    <h4 style="text-align: center">Before Confirm</h4>
                    <p><span style="font-weight: bold">OrderID:</span>&ensp;&ensp;<span>{{ $order->OrderID }}</span></p>
                    <p><span style="font-weight: bold">Customer Email:</span>&ensp;&ensp;<span>{{ $order->Email }}</span>
                    </p>
                    <p><span style="font-weight: bold">Telephone:</span>&ensp;&ensp;<span>{{ $order->Telephone }}</span>
                    </p>
                    <p><span
                            style="font-weight: bold">Address:</span>&ensp;&ensp;<span>{{ $order->DeliveryAddress }}</span>
                    </p>
                    <p><span
                            style="font-weight: bold">Description:</span>&ensp;&ensp;<span>{{ $order->Description }}</span>
                    </p>
                </div>
                <div class="col-4"
                    style="padding-left: 20px;padding-top:20px;font-size: 15px;border-right: 1.5px solid black">
                    <h4 style="text-align: center">After Confirm</h4>
                    <p><span style="font-weight: bold">FullName
                            Received:</span>&ensp;&ensp;<span>{{ $order->FullNameAfterConfirm }}</span></p>
                    <p><span
                            style="font-weight: bold">Telephone:</span>&ensp;&ensp;<span>{{ $order->TelephoneAfterConfirm }}</span>
                    </p>
                    <p><span style="font-weight: bold">Delivery
                            Address:</span>&ensp;&ensp;<span>{{ $order->DeliveryAddressAfterConfirm }}</span></p>
                    <p><span
                            style="font-weight: bold">Description:</span>&ensp;&ensp;<span>{{ $order->DescriptionAfterConfirm }}</span>
                    </p>
                </div>
                <div class="col-3" style="padding-left: 20px;padding-top:20px;font-size: 15px">
                    <h4 style="text-align: center">Done</h4>
                    <p><span style="font-weight: bold">Delivery
                            Date:</span>&ensp;&ensp;<span>{{ $order->DeliveryDate }}</span></p>

                </div>

            </div>
        </div>
    @endif


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table class="table ">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>STT</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody style="font-family: 'PT Serif', serif;word-spacing: 2px">
                                <?php $total_money = 0;
                                $stt = 1; ?>
                                @foreach ($ordersDetails as $o)
                                    <?php
                                    $total_money += $products[$o->ProductID]->Price * $products[$o->ProductID]->Quantity;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;line-height: 130px;font-size: 20px;width: 100px;">
                                            {{ $stt }}</td>
                                        <td style="text-align: center;width: 130px;line-height: 130px"><img
                                                src="{{ asset('' . $products[$o->ProductID]->Image) }}" alt=""
                                                style="width: 100%"> </td>
                                        <td
                                            style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                            {{ $products[$o->ProductID]->ProductName }}</td>
                                        <td
                                            style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                            {{ $products[$o->ProductID]->Quantity }}</td>
                                        <td class="text-center"
                                            style="text-align: center;line-height: 130px;font-size: 18px;width: 150px;">
                                            ${{ $products[$o->ProductID]->Price * $products[$o->ProductID]->Quantity }}
                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                                <tr>
                                    <th colspan="3" style="text-align: center;line-height: 35px;padding: 40px 0px;">Total
                                        Money</th>
                                    <td colspan="2" class="text-center" style="font-size: 25px;padding: 40px 0px;">$
                                        &ensp;<?php echo $total_money; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //function 1 onclickDelivery 
        function onClickDelivery(orderID) {
            $('#confirmFullName')[0].setCustomValidity('');
            $('#confirmAddress')[0].setCustomValidity('');
            $('#confirmTelephone')[0].setCustomValidity('');
            var confirmFullName = $('#confirmFullName').val().trim();
            var confirmAddress = $('#confirmAddress').val().trim();
            var confirmTelephone = $('#confirmTelephone').val().trim();
            var confirmDescription = $('#confirmDescription').val().trim();
            var error = 0;
            if (confirmFullName.length == 0) {
                $('#confirmFullName')[0].setCustomValidity('Full name cannot be blank');
                error += 1;
            }
            if (confirmAddress.length == 0) {
                $('#confirmAddress')[0].setCustomValidity('Address cannot be blank');
                error += 1;
            }
            if (confirmTelephone.length == 0) {
                $('#confirmTelephone')[0].setCustomValidity('Telephone cannot be blank');
                error += 1;
            }
            if (confirmTelephone.match(/[A-Za-z]+/)) {
                $('#confirmTelephone')[0].setCustomValidity('Telephone cannot contain word');
                error += 1;
            }
            if (error == 0) {
                if (confirm("Are you sure want to change status order to 'Delivery'?")) {
                    var form = new FormData();
                    form.append("OrderID", orderID);
                    form.append("FullName", confirmFullName);
                    form.append("Address", confirmAddress);
                    form.append("Telephone", confirmTelephone);
                    form.append("Description", confirmDescription);
                    form.append("_token", "{{ csrf_token() }}");
                    $.ajax({
                        url: 'update-delivery-order-status',
                        type: "POST",
                        data: form,
                        processData: false,
                        contentType: false,
                        mimeType: "multipart/form-data",
                        success: function(response) {
                            alert(response);
                            location.reload();
                        }
                    });
                }
            }
        }

        function onClickDone(orderID) {
            $('#deliveryDate')[0].setCustomValidity('');
            var deliveryDate1 = $('#deliveryDate').val();
            var deliveryDate = $('#deliveryDate').val().trim();
            var date = new Date();
            var error = 0;
            if (deliveryDate == "") {
                $('#deliveryDate')[0].setCustomValidity('Date cannot be blank');
                error += 1;
            }
            if(deliveryDate1 > date) {
                $('#deliveryDate')[0].setCustomValidity('Delivery Date must before now ');
                error += 1;
            }
            if (error == 0) {
                if (confirm("Are you sure want to change status order to 'Done'?")) {
                    var form = new FormData();
                    form.append("OrderID", orderID);
                    form.append("DeliveryDate", deliveryDate);
                    form.append("_token", "{{ csrf_token() }}");
                    $.ajax({
                        url: 'update-done-order-status',
                        type: "POST",
                        data: form,
                        processData: false,
                        contentType: false,
                        mimeType: "multipart/form-data",
                        success: function(response) {
                            alert(response);
                            location.reload();
                        }
                    });
                }
            }
        }

        function onClickCancel(orderID) {
            if (confirm("Are you sure want to change status order to 'Cancel'?")) {
                var form = new FormData();
                form.append("OrderID", orderID);
                form.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    url: 'update-cancel-order-status',
                    type: "POST",
                    data: form,
                    processData: false,
                    contentType: false,
                    mimeType: "multipart/form-data",
                    success: function(response) {
                        alert(response);
                        location.reload();
                    }
                });
            }
        }
    </script>
@endsection
