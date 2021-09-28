@extends('layouts.admin.home')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Button trigger modal -->
            <div class="d-flex ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct"
                    style="margin-left: 10px">
                    Add product
                </button>
                <form class="d-flex" style="margin-left: 30px" action="" method="GET">
                    @if ($searchName != null)
                        <input id="search-input" type="search" class="form-control " name="name" placeholder="Search"
                            value="{{ $searchName }}" required />
                    @else
                        <input id="search-input" type="search" class="form-control " name="name" placeholder="Search"
                            required />
                    @endif
                    <button type="submit" id="search-button" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div style="margin-bottom: 20px"></div>

            {{-- Modal for Add Product --}}
            <div class="modal fade" id="addProduct" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="javascript:void(0)" id="formAddProduct" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input class="form-control " type="text" name="productName" id="addProductName"
                                        placeholder="Enter Product Name">
                                </div>
                                <label>File Image</label>
                                <div class="form-group">
                                    <input type="file" id="addImage" name="fileProduct">
                                </div>
                                <div class="form-group">
                                    <label>Release Date</label>
                                    <input class="form-control" name="releaseDate" type="date" id="addReleaseDate">
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control " name="price" type="number" id="addPrice">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="custom-select my-1 mr-sm-2" id="selectAddStatus" name="status">
                                        <option value="">Choose Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Deactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="custom-select my-1 mr-sm-2" id="selectAddCategory" name="category">
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->CategoryID }}">{{ $c->CategoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Information</label>
                                <div class="form-group">
                                    <textarea class="form-control " type="text" id="addInformation"
                                        name="information"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" onclick="btnAdd()">Add new</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            {{-- Table list Products --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead style="text-align: center">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    {{-- <th>Category Name</th> --}}
                                    <th>Release Date</th>
                                    <th>Price</th>
                                    {{-- <th>Status</th> --}}
                                    {{-- <th>Information</th> --}}
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Details</th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $p)
                                        <tr>
                                            <td style="text-align: center; line-height: 100px">{{ $p->ProductID }}</td>
                                            <td style="text-align: center; line-height: 100px;width: 100px"><img
                                                    src="{{ asset('' . $p->Image) }}" alt="" style="width: 100%"></td>
                                            <td style="text-align: center; line-height: 100px">{{ $p->ProductName }}</td>
                                            <td style="text-align: center; line-height: 100px">{{ $p->ReleaseDate }}</td>
                                            <td style="text-align: center; line-height: 100px">${{ $p->Price }}</td>
                                            <td style="text-align: center; line-height: 100px">
                                                <p data-placement="top">
                                                    @if ($p->Status == 1)
                                                        <button class="btn btn-success btn-xm" data-toggle="modal"
                                                            data-target="#active{{ $p->ProductID }}"
                                                            style="font-weight: bold">
                                                            <span data-toggle="tooltip" data-title="Active">Active</span>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-danger btn-xm" data-toggle="modal"
                                                            data-target="#deactive{{ $p->ProductID }}"
                                                            style="font-weight: bold">
                                                            <span data-toggle="tooltip"
                                                                data-title="Deactive">Deactive</span>
                                                        </button>
                                                    @endif
                                                </p>
                                            </td>
                                            <td style="text-align: center; line-height: 100px">
                                                <p data-placement="top">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                                                        data-target="#edit{{ $p->ProductID }}">
                                                        <svg data-toggle="tooltip" title="Edit"
                                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                        </svg>
                                                    </button>
                                                </p>
                                            </td>
                                            <td style="text-align: center; line-height: 100px">
                                                <p data-placement="top">
                                                    <button class="btn btn-info btn-xs" data-title="Details"
                                                        data-toggle="modal" data-target="#details{{ $p->ProductID }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" data-toggle="tooltip"
                                                            title="Details" width="20" height="20" fill="currentColor"
                                                            class="bi bi-grid" viewBox="0 0 16 16">
                                                            <path
                                                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                                                        </svg>
                                                    </button>
                                                </p>
                                            </td>
                                        </tr>

                        </div>


                        @endforeach
                        </tbody>
                        </table>
                        @foreach ($products as $p)
                            {{-- Modal for Deactive Product --}}
                            <div class="modal fade" id="deactive{{ $p->ProductID }}" data-backdrop="static"
                                tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                                Active</h5>
                                        </div>
                                        <div class="modal-body">

                                            <div style="color: green">
                                                <b>
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    Do you sure you want to Active this Product?
                                                </b>
                                            </div>
                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-danger"
                                                onclick="btnActive({{ $p->ProductID }})">Yes</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            {{-- Modal for Active Product --}}
                            <div class="modal fade" id="active{{ $p->ProductID }}" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="edit" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                                Deactive</h5>
                                        </div>
                                        <div class="modal-body">

                                            <div style="color: red">
                                                <b>
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                    Do you sure you want to Deactive this Product?
                                                </b>
                                            </div>
                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-danger"
                                                onclick="btnDeactive({{ $p->ProductID }})">Yes</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            {{-- Modal for Edit Product --}}
                            <div class="modal fade" id="edit{{ $p->ProductID }}" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="edit" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Edit Product</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="javascript:void(0)" id="formAddProduct" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input class="form-control " type="text" name="productName"
                                                        id="editProductName" value="{{ $p->ProductName }}">
                                                </div>
                                                <label>File Image</label>
                                                <div class="form-group">
                                                    <input type="file" id="editImage" name="fileProduct">
                                                </div>
                                                <div class="form-group">
                                                    <label>Release Date</label>
                                                    <input class="form-control" name="releaseDate" type="date"
                                                        id="editReleaseDate" value="{{ $p->ReleaseDate }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input class="form-control " name="price" type="number" id="editPrice"
                                                        value="{{ $p->Price }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="custom-select my-1 mr-sm-2" id="selectEditStatus"
                                                        name="status">
                                                        <option value="">Choose Status</option>
                                                        @if ($p->Status == 1)
                                                            <option value="1" selected>Active</option>
                                                            <option value="2">Deactive</option>

                                                        @else
                                                            <option value="1">Active</option>
                                                            <option value="2" selected>Deactive</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <select class="custom-select my-1 mr-sm-2" id="selectEditCategory"
                                                        name="category">
                                                        <option value="">Choose Category</option>
                                                        @foreach ($categories as $c)
                                                            @if ($c->CategoryID == $p->CategoryID)
                                                                <option value="{{ $c->CategoryID }}" selected>
                                                                    {{ $c->CategoryName }}</option>

                                                            @else
                                                                <option value="{{ $c->CategoryID }}">
                                                                    {{ $c->CategoryName }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label>Information</label>
                                                <div class="form-group">
                                                    <textarea class="form-control " type="text" id="editInformation"
                                                        name="information">{{ $p->Information }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"
                                                    onclick="btnEdit({{ $p->ProductID }})">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            {{-- Modal for Details Product --}}
                            <div class="modal fade" id="details{{ $p->ProductID }}" data-backdrop="static">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; Product Details</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="font-family: 'PT Serif', serif;">
                                            <table class="table ">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Information</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-family: 'PT Serif', serif;word-spacing: 2px">
                                                    <tr>
                                                        <td style="text-align: center; line-height: 130px;width: 200px"><img
                                                                src="{{ asset('' . $p->Image) }}" alt="" style="width: 100%">
                                                        </td>
                                                        <td
                                                            style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                            {{ $p->ProductName }}</td>
                                                        <td
                                                            style="text-align: center; line-height: 130px;max-width:400px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                            {{ $p->Information }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!-- /.modal-dialog -->
                        @endforeach


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
                                                class="page-link" href="javascript:void(0);">{{ $i }}</a>
                                        </li>
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
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
    <script>
        function btnAdd() {
            $('#addProductName')[0].setCustomValidity('');
            $('#addImage')[0].setCustomValidity('');
            $('#addReleaseDate')[0].setCustomValidity('');
            $('#addPrice')[0].setCustomValidity('');
            $('#selectAddStatus')[0].setCustomValidity('');
            $('#selectAddCategory')[0].setCustomValidity('');
            $('#addInformation')[0].setCustomValidity('');
            var productName = $('#addProductName').val().trim();
            var addImage = $('#addImage').val();
            var addReleaseDate = $('#addReleaseDate').val();
            var addPrice = $('#addPrice').val();
            var selectAddStatus = $('#selectAddStatus').val();
            var selectAddCategory = $('#selectAddCategory').val();
            var addInformation = $('#addInformation').val().trim();
            var error = 0;
            if (productName.length == 0) {
                $('#addProductName')[0].setCustomValidity('Product name cannot be blank');
                error += 1;
            }
            if (addReleaseDate.length == 0) {
                $('#addReleaseDate')[0].setCustomValidity('Release Date cannot be blank');
                error += 1;
            }
            if (addPrice <= 0) {
                $('#addPrice')[0].setCustomValidity('Price must be greater than 0');
                error += 1;
            }
            if (selectAddStatus == '') {
                $('#selectAddStatus')[0].setCustomValidity('Status cannot be blank');
                error += 1;
            }
            if (selectAddCategory == '') {
                $('#selectAddCategory')[0].setCustomValidity('Category cannot be blank');
                error += 1;
            }
            if (addInformation == '') {
                $('#addInformation')[0].setCustomValidity('Information cannot be blank');
                error += 1;
            }
            if (addImage == '') {
                $('#addImage')[0].setCustomValidity('File image is required');
                error += 1;
            }

            if (error == 0) {
                let img = $("#addImage");
                var form = new FormData();
                form.append("image", img[0].files[0]);
                form.append("productName", productName);
                form.append("releaseDate", addReleaseDate);
                form.append("price", addPrice);
                form.append("status", selectAddStatus);
                form.append("category", selectAddCategory);
                form.append("information", addInformation);
                form.append("_token", "{{ csrf_token() }}");
                // e.preventDefault ();
                $.ajax({
                    url: 'add-product',
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
        //function 2 for button Edit
        function btnEdit(productID) {
            $('#editProductName')[0].setCustomValidity('');
            $('#editImage')[0].setCustomValidity('');
            $('#editReleaseDate')[0].setCustomValidity('');
            $('#editPrice')[0].setCustomValidity('');
            $('#selectEditStatus')[0].setCustomValidity('');
            $('#selectEditCategory')[0].setCustomValidity('');
            $('#editInformation')[0].setCustomValidity('');
            var productName = $('#editProductName').val().trim();
            var editImage = $('#editImage').val();
            var editReleaseDate = $('#editReleaseDate').val();
            var editPrice = $('#editPrice').val();
            var selectEditStatus = $('#selectEditStatus').val();
            var selectEditCategory = $('#selectEditCategory').val();
            var editInformation = $('#editInformation').val().trim();
            var error = 0;
            if (productName.length == 0) {
                $('#editProductName')[0].setCustomValidity('Product name cannot be blank');
                error += 1;
            }
            if (editReleaseDate.length == 0) {
                $('#editReleaseDate')[0].setCustomValidity('Release Date cannot be blank');
                error += 1;
            }
            if (editPrice <= 0) {
                $('#editPrice')[0].setCustomValidity('Price must be greater than 0');
                error += 1;
            }
            if (selectEditStatus == '') {
                $('#selectEditStatus')[0].setCustomValidity('Status cannot be blank');
                error += 1;
            }
            if (selectEditCategory == '') {
                $('#selectEditCategory')[0].setCustomValidity('Category cannot be blank');
                error += 1;
            }
            if (editInformation == '') {
                $('#editInformation')[0].setCustomValidity('Information cannot be blank');
                error += 1;
            }

            if (error == 0) {
                let img = $("#editImage");
                var form = new FormData();
                form.append("image", img[0].files[0]);
                form.append("productID", productID);
                form.append("productName", productName);
                form.append("releaseDate", editReleaseDate);
                form.append("price", editPrice);
                form.append("status", selectEditStatus);
                form.append("category", selectEditCategory);
                form.append("information", editInformation);
                form.append("_token", "{{ csrf_token() }}");
                // e.preventDefault ();
                $.ajax({
                    url: 'edit-product',
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
        //function 3 for button Edit
        function btnDeactive(productID) {
            var form = new FormData();
            form.append("productID", productID);
            form.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: 'deactive-product',
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
        //function 4 for button Edit
        function btnActive(productID) {
            var form = new FormData();
            form.append("productID", productID);
            form.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: 'active-product',
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
        //function 5 for check param in url
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
        // Function 6 for onclick pagination
        function onClickPagination(page) {
            var paramName = getUrlParameter("name");
            if (paramName == null) {
                window.location.href = "./product?page=" + page;
            } else {
                window.location.href = "./product?name=" + paramName + "&page=" + page;
            }
        };
    </script>
@endsection
