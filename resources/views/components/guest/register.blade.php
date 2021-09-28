@extends('layouts.guest.home')

@section('content')
    <style>
        .alazea-main-menu {
            background-color: #064218;
            position: fixed;
            width: 100%;
        }

    </style>
    <div style="margin-bottom: 150px"></div>
    {{-- Content start --}}
    <div id="login_page"
        style="margin: 0 auto; width: 60%; margin-bottom: 200px;background: #f2f4f5; padding: 30px; border-radius: 10px;box-shadow: 10px 10px 20px #a0b8a7">
        <h1
            style="text-align: center; font-size: 65px;color: #072713; font-family: 'Great Vibes', cursive;letter-spacing: 10px">
            Register</h1>
        <div class="row">
            <div class="col">
                <form action="register" method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label style="font-family: 'PT Serif', serif;">Email</label>
                                    <input type="email" class="form-control" name="txtEmail" placeholder="Enter Email"
                                        required style="font-size: 25px;font-family: 'PT Serif', serif;">
                                </div>
                            </td>
                            <td style="padding-left: 70px;">
                                <div class="form-group">
                                    <label style="font-family: 'PT Serif', serif;">First name</label>
                                    <input type="text" class="form-control" name="txtFirstname" placeholder="First name"
                                        required style="font-size: 25px;font-family: 'PT Serif', serif;">
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label style="font-family: 'PT Serif', serif;">Password</label>
                                    <input type="password" class="form-control" name="txtPassword" placeholder="Password"
                                        required style="font-size: 25px;font-family: 'PT Serif', serif;">
                                </div>
                            </td>
                            <td style="padding-left: 70px">
                                <div class="form-group">
                                    <label style="font-family: 'PT Serif', serif;">Middle name</label>
                                    <input type="text" class="form-control" name="txtMiddlename" placeholder="Middle name"
                                        required style="font-size: 25px;font-family: 'PT Serif', serif;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label style="font-family: 'PT Serif', serif;">Address</label>
                                    <input type="text" class="form-control" name="txtAddress" placeholder="Address"
                                        required style="font-size: 25px;font-family: 'PT Serif', serif;">
                                </div>
                            </td>
                            <td style="padding-left: 70px">
                                <div class="form-group">
                                    <label style="font-family: 'PT Serif', serif;">Last name</label>
                                    <input type="text" class="form-control" name="txtLastname" placeholder="Last name"
                                        required style="font-size: 25px;font-family: 'PT Serif', serif;">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label style="font-family: 'PT Serif', serif;">Telephone</label>
                                    <input type="text" class="form-control" name="txtTelephone" placeholder="Telephone"
                                        required style="font-size: 25px;font-family: 'PT Serif', serif;">
                                </div>
                            </td>
                            <td style="padding-left: 70px">
                                <div class="form-group">
                                    <label style="font-family: 'PT Serif', serif;">Birthday</label>
                                    <input type="date" class="form-control" name="txtBirthday" placeholder="Last name"
                                        required style="font-size: 25px;font-family: 'PT Serif', serif;">
                                </div>
                            </td>
                        </tr>
                    </table>
                    @isset($message)
                        <div><span style="font-weight: bold;color: red">Not success: {{ $message }}</span></div>
                    @endisset
                    <br><br>
                    <div style="float: right;">
                        <button type="submit" class="btn btn-info"
                            style="font-family: 'PT Serif', serif;font-size: 25px;padding-left: 30px;padding-right:30px;margin-left:30px;border-radius: 10px">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
