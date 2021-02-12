<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/shoutbox.css">
    <link rel="stylesheet" href="css/up.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/post.css">
    <title>Welcome {{Auth::user()->userName}}</title>

</head>
<body>

<!-- upper section starts -->

<div id="upper-part">

    <!-- logo/branding -->

    <div id="upp">
        <div id="left"><a href="#"><p id="name"><span style="color:#FF0000 ">G</span><span style="color: #FF7F00">H</span><span style="color: #FFFF00">URI</span><span style="color: #00FF00">FI</span><span style="color: rgb(32, 136, 255) ">RI</span><span style="color:  rgb(121, 0, 207)"></span><span style="color:  #8B00FF">.COM</span></p></a></div>

        <div id="right">
            <a href="{{ URL::to('logout') }}"><button id="logout-btn">Logout</button></a>
        </div>
    </div>

    <!-- navbar -->

    <div id="nav">
        <ul>
            <li><a href="/home">Home</a></li>
            <li><a href="/places">Find Places</a></li>
            <li><a href="/tours">Tours</a></li>
            <li><a href="/about">About</a></li>
        </ul>
    </div>
</div>
<div class="footer">
    <div class="foot-sec">



    </div>
    <div class="foot-sec">

    </div>
    <div class="foot-sec">

    </div>
</div>

</body>
</html>
