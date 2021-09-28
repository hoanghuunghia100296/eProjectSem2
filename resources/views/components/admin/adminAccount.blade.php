@extends('layouts.admin.home')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Account</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Admin Account</li>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"
                    style="margin-left: 10px">
                    Add account
                </button>

            </div>
            <div style="margin-bottom: 20px"></div>

            <!-- Modal for Add Account-->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">&ensp;&ensp;&ensp;
                                Add Admin Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="javascript:void(0)">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Email <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="addEmail" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Password <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="addPassword" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">First name <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="addFirstName"
                                        placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Middle name </label>
                                    <input type="text" class="form-control" id="addMiddleName"
                                        placeholder="Enter middle name">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Last name <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="addLastName"
                                        placeholder="Enter last name">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Telephone <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="addTelephone"
                                        placeholder="Enter Telephone">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Address <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="addAddress" placeholder="Enter Address">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Birthday <span
                                            style="color: red">*</span></label>
                                    <input type="date" class="form-control" id="addBirthday">
                                </div>
                                <label>Your avatar <span style="color: red">*</span></label>
                                <div class="form-group">
                                    <input type="file" id="addImage">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="btnAddNew" onclick="btnAdd()">Add
                                    new</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Table list Admin Accounts --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead style="text-align: center">
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Email</th>
                                    <th>First name</th>
                                    <th>Middle name</th>
                                    <th>Last name</th>
                                    <th>Edit</th>
                                    <th>Details</th>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $a)
                                        <tr>
                                            <td style="text-align: center; line-height: 100px">{{ $a->AccountID }}</td>
                                            <td style="text-align: center; line-height: 100px;width: 100px"><img
                                                    src="{{ asset('' . $a->Image) }}" alt="" style="width: 100%"></td>
                                            <td style="text-align: center; line-height: 100px">{{ $a->Email }}</td>
                                            <td style="text-align: center; line-height: 100px">{{ $a->FirstName }}</td>
                                            <td style="text-align: center; line-height: 100px">{{ $a->MiddleName }}</td>
                                            <td style="text-align: center; line-height: 100px">{{ $a->LastName }}</td>
                                            <td style="text-align: center; line-height: 100px">
                                                <p data-placement="top">
                                                    <button class="btn btn-primary btn-xs" data-title="Edit"
                                                        data-toggle="modal" data-target="#edit{{ $a->AccountID }}">
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
                                                        data-toggle="modal" data-target="#details{{ $a->AccountID }}">
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
                                    @endforeach
                                </tbody>
                            </table>
                            @foreach ($admins as $a)
                                {{-- Modal for Edit Account --}}
                                <div class="modal fade" id="edit{{ $a->AccountID }}" data-backdrop="static"
                                    tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                                    &ensp;&ensp;&ensp; Edit Account</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="javascript:void(0)">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="formGroupExampleInput">Email <span
                                                                style="color: red">*</span></label>
                                                        <input type="text" class="form-control" id="editEmail"
                                                            value="{{ $a->Email }}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2"
                                                            for="inlineFormCustomSelectPref">Password <span
                                                                style="color: red">*</span></label>
                                                        <input type="text" class="form-control" id="editPassword"
                                                            value="{{ $a->Password }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">First
                                                            name <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" id="editFirstName"
                                                            value="{{ $a->FirstName }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2"
                                                            for="inlineFormCustomSelectPref">Middle name </label>
                                                        <input type="text" class="form-control" id="editMiddleName"
                                                            value="{{ $a->MiddleName }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Last
                                                            name <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" id="editLastName"
                                                            value="{{ $a->LastName }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2"
                                                            for="inlineFormCustomSelectPref">Telephone <span
                                                                style="color: red">*</span></label>
                                                        <input type="text" class="form-control" id="editTelephone"
                                                            value="{{ $a->Telephone }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2"
                                                            for="inlineFormCustomSelectPref">Address <span
                                                                style="color: red">*</span></label>
                                                        <input type="text" class="form-control" id="editAddress"
                                                            value="{{ $a->Address }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="my-1 mr-2"
                                                            for="inlineFormCustomSelectPref">Birthday <span
                                                                style="color: red">*</span></label>
                                                        <input type="date" class="form-control" id="editBirthday"
                                                            value="{{ $a->Birthday }}">
                                                    </div>
                                                    <label>Your avatar </label>
                                                    <div class="form-group">
                                                        <input type="file" id="editImage">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="btnEdit({{ $a->AccountID }})">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                {{-- Modal for Details Account --}}
                                <div class="modal fade" id="details{{ $a->AccountID }}" data-backdrop="static">
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
                                                            <th>Email</th>
                                                            <th>Telephone</th>
                                                            <th>Address</th>
                                                            <th>Birthday</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-family: 'PT Serif', serif;word-spacing: 2px">
                                                        <tr>
                                                            <td
                                                                style="text-align: center; line-height: 130px;text-align: center;width: 150px;padding-top: 10px">
                                                                <img src="{{ asset('' . $a->Image) }}" alt=""
                                                                    style="width: 100%"> </td>
                                                            <td
                                                                style="text-align: center; line-height: 130px;max-width:200px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                                {{ $a->Email }}</td>
                                                            <td
                                                                style="text-align: center; line-height: 130px;max-width:400px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                                {{ $a->Telephone }}</td>
                                                            <td
                                                                style="text-align: center; line-height: 130px;max-width:400px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                                {{ $a->Address }}</td>
                                                            <td
                                                                style="text-align: center; line-height: 130px;max-width:400px;overflow: hidden;white-space: nowrap;font-size: 18px">
                                                                {{ $a->Birthday }}</td>
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <script>
        //Function 1
        function btnAdd() {
            $('#addEmail')[0].setCustomValidity('');
            $('#addPassword')[0].setCustomValidity('');
            $('#addFirstName')[0].setCustomValidity('');
            $('#addMiddleName')[0].setCustomValidity('');
            $('#addLastName')[0].setCustomValidity('');
            $('#addTelephone')[0].setCustomValidity('');
            $('#addAddress')[0].setCustomValidity('');
            $('#addBirthday')[0].setCustomValidity('');
            $('#addImage')[0].setCustomValidity('');
            var addEmail = $('#addEmail').val().trim();
            var addPassword = $('#addPassword').val().trim();
            var addFirstName = $('#addFirstName').val().trim();
            var addMiddleName = $('#addMiddleName').val().trim();
            var addLastName = $('#addLastName').val().trim();
            var addTelephone = $('#addTelephone').val().trim();
            var addAddress = $('#addAddress').val().trim();
            var addBirthday = $('#addBirthday').val();
            var addImage = $('#addImage').val();
            var error = 0;
            if (addEmail.length == 0) {
                $('#addEmail')[0].setCustomValidity('Email cannot be blank');
                error += 1;
            }
            if (addPassword.length == 0) {
                $('#addPassword')[0].setCustomValidity('Password cannot be blank');
                error += 1;
            }
            if (addFirstName.length == 0) {
                $('#addFirstName')[0].setCustomValidity('First name cannot be blank');
                error += 1;
            }
            if (addLastName.length == 0) {
                $('#addLastName')[0].setCustomValidity('Last name cannot be blank');
                error += 1;
            }
            if (addTelephone.length == 0) {
                $('#addTelephone')[0].setCustomValidity('Telephone cannot be blank');
                error += 1;
            }
            if (addTelephone.match(/[A-Za-z]+/)) {
                $('#addTelephone')[0].setCustomValidity('Telephone cannot contain word');
                error += 1;
            }
            if (addAddress.length == 0) {
                $('#addAddress')[0].setCustomValidity('Address cannot be blank');
                error += 1;
            }
            if (addBirthday == '') {
                $('#addBirthday')[0].setCustomValidity('Birthday cannot be blank');
                error += 1;
            }
            if (addImage == '') {
                $('#addImage')[0].setCustomValidity('File image is required');
                error += 1;
            }
            addFirstName = capitalizeFirstLetter(addFirstName);
            addMiddleName = capitalizeFirstLetter(addMiddleName);
            addLastName = capitalizeFirstLetter(addLastName);
            if (error == 0) {
                let img = $("#addImage");
                var form = new FormData();
                form.append("image", img[0].files[0]);
                form.append("Email", addEmail);
                form.append("Password", addPassword);
                form.append("FirstName", addFirstName);
                form.append("MiddleName", addMiddleName);
                form.append("LastName", addLastName);
                form.append("Telephone", addTelephone);
                form.append("Address", addAddress);
                form.append("Birthday", addBirthday);
                form.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    url: 'add-admin-account',
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
        //function 2
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        //Function 3
        function btnEdit(accountID) {
            $('#editEmail')[0].setCustomValidity('');
            $('#editPassword')[0].setCustomValidity('');
            $('#editFirstName')[0].setCustomValidity('');
            $('#editMiddleName')[0].setCustomValidity('');
            $('#editLastName')[0].setCustomValidity('');
            $('#editTelephone')[0].setCustomValidity('');
            $('#editAddress')[0].setCustomValidity('');
            $('#editBirthday')[0].setCustomValidity('');
            var editEmail = $('#editEmail').val().trim();
            var editPassword = $('#editPassword').val().trim();
            var editFirstName = $('#editFirstName').val().trim();
            var editMiddleName = $('#editMiddleName').val().trim();
            var editLastName = $('#editLastName').val().trim();
            var editTelephone = $('#editTelephone').val().trim();
            var editAddress = $('#editAddress').val().trim();
            var editBirthday = $('#editBirthday').val();
            var editImage = $('#editImage').val();
            var error = 0;
            if (editEmail.length == 0) {
                $('#editEmail')[0].setCustomValidity('Email cannot be blank');
                error += 1;
            }
            if (editPassword.length == 0) {
                $('#editPassword')[0].setCustomValidity('Password cannot be blank');
                error += 1;
            }
            if (editFirstName.length == 0) {
                $('#editFirstName')[0].setCustomValidity('First name cannot be blank');
                error += 1;
            }
            if (editLastName.length == 0) {
                $('#editLastName')[0].setCustomValidity('Last name cannot be blank');
                error += 1;
            }
            if (editTelephone.length == 0) {
                $('#editTelephone')[0].setCustomValidity('Telephone cannot be blank');
                error += 1;
            }
            if (editTelephone.match(/[A-Za-z]+/)) {
                $('#editTelephone')[0].setCustomValidity('Telephone cannot contain word');
                error += 1;
            }
            if (editAddress.length == 0) {
                $('#editAddress')[0].setCustomValidity('Address cannot be blank');
                error += 1;
            }
            if (editBirthday == '') {
                $('#editBirthday')[0].setCustomValidity('Birthday cannot be blank');
                error += 1;
            }
            editFirstName = capitalizeFirstLetter(editFirstName);
            editMiddleName = capitalizeFirstLetter(editMiddleName);
            editLastName = capitalizeFirstLetter(editLastName);

            if (error == 0) {
                let img = $("#editImage");
                var form = new FormData();
                form.append("image", img[0].files[0]);
                form.append("AccountID", accountID);
                form.append("Email", editEmail);
                form.append("Password", editPassword);
                form.append("FirstName", editFirstName);
                form.append("MiddleName", editMiddleName);
                form.append("LastName", editLastName);
                form.append("Telephone", editTelephone);
                form.append("Address", editAddress);
                form.append("Birthday", editBirthday);
                form.append("_token", "{{ csrf_token() }}");
                $.ajax({
                    url: 'edit-admin-account',
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
