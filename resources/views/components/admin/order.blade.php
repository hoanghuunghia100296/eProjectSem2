@extends('layouts.admin.home')

@section('content')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
    </script>
    <style>
        a:hover,
        a:focus {
            text-decoration: none;
            outline: none;
        }

        .nav-tabs {
            border-bottom: 1px solid #e4e4e4;
        }

        .nav-tabs>li {
            margin-right: 1px;
        }

        .nav-tabs>li>a {
            border-radius: 0px;
            border: 1px solid #e4e4e4;
            border-right: 0px none;
            margin-right: 0px;
            padding: 8px 17px;
            color: #222222;
            transition: all 0.3s ease-in 0s;
        }

        .nav-tabs>li:last-child {
            border-right: 1px solid #ededed;
        }

        .nav-tabs>li>a {
            padding: 15px 30px;
            border: 1px solid #ededed;
            border-right: 0px none;
            border-top: 2px solid #ededed;
            background: #ededed;
            color: #8f8f8f;
            font-weight: bold;
        }

        .nav-tabs>li>a:hover {
            border-bottom-color: #ededed;
            border-right: 0px none;
            background: #f1f1f1;
            color: #444;
        }

        .nav-tabs>li.active>a,
        .nav-tabs>li.active>a:focus,
        .nav-tabs>li.active>a:hover {
            border-top: 2px solid #3498db;
            border-right: 0px none;
            color: #444;
        }

        .tab-content>.tab-pane {
            border: 1px solid #e4e4e4;
            border-top: 0px none;
            padding: 20px;
            line-height: 22px;
        }

        .tab-content>.tab-pane>h3 {
            margin-top: 0;
        }

    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    {{-- Main content --}}
    <div class=" d-flex ">
        <button class="btn btn-secondary" style="margin-left: 30px" onclick="onClickStatus(0)">All</button>
        <button class="btn btn-warning" style="margin-left: 30px" onclick="onClickStatus(1)">Processing</button>
        <button class="btn btn-success" style="margin-left: 30px" onclick="onClickStatus(2)">Delivery</button>
        <button class="btn btn-info" style="margin-left: 30px" onclick="onClickStatus(3)">Done</button>
        <button class="btn btn-danger" style="margin-left: 30px" onclick="onClickStatus(4)">Cancel</button>
    </div>

    <p style="margin-left: 30px;margin-top: 30px;color: #707070;font-family: Dosis, sans-serif;"><span
            style="font-size: 22px;">{{ $statusName }} Orders</span>
        @if ($totalOrders == 0)
            <span style="font-size:14px;font-weight: 500;">&ensp;&ensp; 0 results</span>
        @else
            <span style="font-size:14px;font-weight: 500;">&ensp;&ensp; Showing {{ $startOrder }}–{{ $endOrder }} of
                {{ $totalOrders }} results</span>
        @endif
    </p>

    <div style="margin-bottom: 30px"></div>
    {{-- Table list Admin Accounts --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead style="text-align: center">
                            <th>Order ID</th>
                            <th>Customer Email</th>
                            <th>Release Date</th>
                            <th>Status</th>
                            <th>Total Money</th>
                            <th>More Info</th>
                        </thead>
                        <tbody style="text-align: center">
                            @foreach ($orders as $o)
                                <tr>
                                    <td>{{ $o->OrderID }}</td>
                                    <td>{{ $o->Email }}</td>
                                    <td>{{ $o->OrderDate }}</td>
                                    @if ($o->OrderStatus == 1)
                                        <td style="color: yellow;font-weight: bold">{{ $o->StatusName }}</td>
                                    @elseif($o->OrderStatus == 2)
                                        <td style="color: green">{{ $o->StatusName }}</td>
                                    @elseif($o->OrderStatus == 3)
                                        <td style="color: #17a2b8">{{ $o->StatusName }}</td>
                                    @elseif($o->OrderStatus == 4)
                                        <td style="color: red">{{ $o->StatusName }}</td>
                                    @endif
                                    <td>${{ $o->TotalPrice }}</td>
                                    <td>
                                        <p data-placement="top"><a href="order-detail?id={{ $o->OrderID }}"
                                                style="color: white">
                                                <button class="btn btn-info btn-xs" data-title="Details" data-toggle="modal"
                                                    data-target="#details">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-arrow-right-short"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                                    </svg>
                                            </a></button></p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
                {{-- Pagination --}}
                @if ($totalPages > 1)
                    <ul class="pagination justify-content-end">
                        @if ($currentPage == 1)
                            <li class="page-item disabled" id="btn-previous"><a class="page-link"
                                    href="javascript:void(0);">Previous</a></li>
                        @else
                            <li class="page-item" id="btn-previous"
                                onclick="onClickPagination({{ $currentPage - 1 }})"><a class="page-link"
                                    href="javascript:void(0)">Previous</a></li>
                        @endif
                        @for ($i = 1; $i <= $totalPages; $i++)
                            @if ($i == $currentPage)
                                <li class="page-item active"><a class="page-link"
                                        href="javascript:void(0);">{{ $i }}</a></li>
                            @else
                                <li class="page-item" onclick="onClickPagination({{ $i }})"><a
                                        class="page-link" href="javascript:void(0);">{{ $i }}</a></li>
                            @endif

                        @endfor
                        @if ($currentPage == $totalPages)
                            <li class="page-item disabled" id="btn-previous"><a class="page-link"
                                    href="javascript:void(0);">Next</a></li>
                        @else
                            <li class="page-item" onclick="onClickPagination({{ $currentPage + 1 }})"><a
                                    class="page-link" href="javascript:void(0);">Next</a></li>
                        @endif
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <script>
        // Function 1 for onclick pagination
        function onClickPagination(page) {
            var paramStatus = getUrlParameter("status");
            if (paramStatus == null) {
                window.location.href = "./order?page=" + page;
            } else {
                window.location.href = "./order?status=" + paramStatus + "&page=" + page;
            }
        };
        //function 2 for check param in url
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
        // Function 3 for onclick status
        function onClickStatus(status) {
            window.location.href = "./order?status=" + status;
        };
    </script>
@endsection
