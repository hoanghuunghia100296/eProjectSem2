@extends('layouts.guest.home')

@section('content')
    <style>
        .alazea-main-menu {
            background-color: #064218;
            position: fixed;
            width: 100%;
        }

    </style>
    <div style="margin-bottom: 200px"></div>
    {{-- Content start --}}
    <div id="login_page"
        style="margin: 0 auto; width: 60%; margin-bottom: 200px;background: #f2f4f5; padding: 30px; border-radius: 10px;box-shadow: 10px 10px 20px #a0b8a7">
        <h1
            style="text-align: center; font-size: 65px;color: #072713; font-family: 'Great Vibes', cursive;letter-spacing: 10px">
            Login</h1>
        <div class="row">
            <div class="col">
                <form action="login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label style="font-family: 'PT Serif', serif;">Email</label>
                        <input type="email" class="form-control" name="txtemail" placeholder="Enter Email" required
                            style="font-size: 25px;font-family: 'PT Serif', serif;">
                    </div>
                    <div class="form-group">
                        <label style="font-family: 'PT Serif', serif;">Password</label>
                        <input type="password" class="form-control" name="txtpassword" placeholder="Password" required
                            style="font-size: 25px;font-family: 'PT Serif', serif;">
                    </div>
                    @isset($message)
                        <div><span style="font-weight: bold;color: red">Not success: {{ $message }}</span></div>
                    @endisset
                    <br><br>
                    <div style="float: right;">
                        <button type="submit" class="btn btn-success"
                            style="font-family: 'PT Serif', serif;font-size: 25px;padding-left: 30px;padding-right:30px;border-radius: 10px">Login</button>
                        <button type="button" class="btn btn-info" onclick="window.location.href='./register'"
                            style="font-family: 'PT Serif', serif;font-size: 25px;padding-left: 30px;padding-right:30px;margin-left:30px;border-radius: 10px">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
