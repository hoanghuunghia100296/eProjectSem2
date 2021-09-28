@extends('layouts.guest.home')

@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(guest/img/bg-img/24.jpg);">
            <h2 style="font-family: 'PT Serif', serif;font-size: 60px;letter-spacing: 3px">Your Information</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Your Information</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <style>
        td {
            padding-bottom: 10px;
        }

    </style>
    <!-- ##### Breadcrumb Area End ##### -->
    <div id="login_page"
        style="margin: 0 auto; width: 50%; margin-bottom: 200px;background: #f2f4f5; padding: 30px; border-radius: 10px;box-shadow: 10px 10px 20px #a0b8a7">
        <h1
            style="text-align: center; font-size: 65px;color: #072713; font-family: 'Great Vibes', cursive;letter-spacing: 10px">
            Your Information</h1>
        <hr style="width: 60%;margin: 0 auto;">
        <div class="row">
            <div class="col">
                <table style="font-size: 20px;margin:0 auto;font-family: 'PT Serif', serif;">
                    <tr>
                        <td style="padding-top: 10px">Email:</td>
                        <td style="padding-left:30px">{{ $user->Email }}</td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td style="padding-left:30px">***************</td>
                    </tr>
                    <tr>
                        <td>First Name:</td>
                        <td style="padding-left:30px">{{ $user->FirstName }}</td>
                    </tr>
                    <tr>
                        <td>Middle Name:</td>
                        <td style="padding-left:30px">{{ $user->MiddleName }}</td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td style="padding-left:30px">{{ $user->LastName }}</td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td style="padding-left:30px">{{ $user->Address }}</td>
                    </tr>
                    <tr>
                        <td>Telephone:</td>
                        <td style="padding-left:30px">{{ $user->Telephone }}</td>
                    </tr>
                    <tr>
                        <td>Birthday:</td>
                        <td style="padding-left:30px">{{ $user->Birthday }}</td>
                    </tr>
                </table>
                <div style="margin-bottom: 30px"></div>
                <div style="float: right;">
                    <button id="edit" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop"
                        style="font-family: 'PT Serif', serif;font-size: 25px;padding-left: 30px;padding-right:30px;border-radius: 10px">Edit
                        information</button>
                </div>
                <!-- Modal for Add Cinema-->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"
                                    style="font-family: 'Great Vibes', cursive;font-size:40px;margin:0 auto;">
                                    &ensp;&ensp;&ensp; Edit Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="javascript:void(0)">
                                <div class="modal-body" style="font-family: 'PT Serif', serif;">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Email</label>
                                        <input disabled type="text" class="form-control" value="{{ $user->Email }}"
                                            id="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2">Password</label>
                                        <input type="password" class="form-control" id="editPassword">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2">First Name</label>
                                        <input type="text" class="form-control" id="editFirstName"
                                            value="{{ $user->FirstName }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2">Middle Name</label>
                                        <input type="text" class="form-control" id="editMiddleName"
                                            value="{{ $user->MiddleName }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2">Last Name</label>
                                        <input type="text" class="form-control" id="editLastName"
                                            value="{{ $user->LastName }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2">Address</label>
                                        <input type="text" class="form-control" id="editAddress"
                                            value="{{ $user->Address }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2">Telephone</label>
                                        <input type="text" class="form-control" id="editTelephone"
                                            value="{{ $user->Telephone }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="my-1 mr-2">Birthday</label>
                                        <input type="date" class="form-control" id="editBirthday"
                                            value="{{ $user->Birthday }}">
                                    </div>
                                    <div class="form-group" id="EditMessage">
                                        {{-- Response the results of Add new Cinema --}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" id="btnEdit"
                                        onclick="onClickBtnUpdate({{ session()->get('userID') }})">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function onClickBtnUpdate(userID) {
            $('#editPassword')[0].setCustomValidity('');
            $('#editFirstName')[0].setCustomValidity('');
            $('#editMiddleName')[0].setCustomValidity('');
            $('#editLastName')[0].setCustomValidity('');
            $('#editAddress')[0].setCustomValidity('');
            $('#editTelephone')[0].setCustomValidity('');
            var userID = userID;
            var password = $('#editPassword').val();
            var firstName = $('#editFirstName').val().trim();
            var middleName = $('#editMiddleName').val().trim();
            var lastName = $('#editLastName').val().trim();
            var address = $('#editAddress').val().trim();
            var telephone = $('#editTelephone').val().trim();
            var birthday = $('#editBirthday').val();
            var error = 0;
            if (password.length == 0) {
                $('#editPassword')[0].setCustomValidity('Password cannot be blank');
                error += 1;
            }
            if (firstName.length == 0) {
                $('#editFirstName')[0].setCustomValidity('First name cannot be blank');
                error += 1;
            }
            if (firstName.match(/\d+/)) {
                $('#editFirstName')[0].setCustomValidity('First name cannot contain number');
                error += 1;
            }
            if (middleName.length == 0) {
                $('#editMiddleName')[0].setCustomValidity('Middle name cannot be blank');
                error += 1;
            }
            if (middleName.match(/\d+/)) {
                $('#editMiddleName')[0].setCustomValidity('Middle name cannot contain number');
                error += 1;
            }
            if (lastName.length == 0) {
                $('#editLastName')[0].setCustomValidity('Last name cannot be blank');
                error += 1;
            }
            if (lastName.match(/\d+/)) {
                $('#editLastName')[0].setCustomValidity('Last name cannot contain number');
                error += 1;
            }
            if (address.length == 0) {
                $('#editAddress')[0].setCustomValidity('Address cannot be blank');
                error += 1;
            }
            if (telephone.length == 0) {
                $('#editTelephone')[0].setCustomValidity('Telephone cannot be blank');
                error += 1;
            }
            if (telephone.match(/[A-Za-z]+/)) {
                $('#editTelephone')[0].setCustomValidity('Telephone cannot contain word');
                error += 1;
            }
            if (error == 0) {
                $.ajax({
                    url: 'http://localhost/Laravel6/public/api/edit-information-account',
                    type: 'post',
                    dataType: 'text',
                    data: { // Danh sách các thuộc tính sẽ gửi đi
                        userID: userID,
                        password: password,
                        firstName: firstName,
                        middleName: middleName,
                        lastName: lastName,
                        address: address,
                        telephone: telephone,
                        birthday: birthday
                    },
                    success: function(response) {
                        if (response == 1) {
                            location.reload();
                        } else {
                            alert("Failed to update your information. Please try again!");
                        }
                    }
                });
            }
        }
    </script>

@endsection
