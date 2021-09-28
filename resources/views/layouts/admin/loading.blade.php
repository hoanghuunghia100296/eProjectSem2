<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loading</title>
    <link rel="stylesheet" href="{{ asset('admin/css/loading.css') }}">
    <script src="{{ asset('admin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
</head>

<body>
    <div id="loading-area" class="boxes">
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

</body>

<script>
    // $(function() {
    // // setTimeout() function will be fired after page is loaded
    // // it will wait for 5 sec. and then will fire
    // // $("#successMessage").hide() function
    // setTimeout(function() {
    //     $("#boxes").hide('blind', {}, 500)
    // }, 5000);
    // });
    window.setTimeout("closeHelpDiv();", 1000);

    function closeHelpDiv() {
        document.getElementById("loading-area").style.display = " none";
    }
</script>

</html>
