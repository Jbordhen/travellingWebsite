<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/places.css">
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

<!-- upper section ends -->


<!-- The flexible grid (content) -->
<div class="row">

    <!-- side column starts -->
    <div class="side">

        <img id="img" src="l2.jpg" alt="">

    </div>

    <!-- side column ends -->

    <!-- main column starts -->
    <div class="main">

        <div class="motto motto1">


            <div id="text" >
                <span>Lalbagh Fort is an mughal fort in the southwestern part of Dhaka, Bangladesh</span>

            </div>



        </div>

        <div class="motto motto2">

            <div id="text" >
                <span> The construction was started in 1678 AD by Mughal Subahdar Muhammad Azam Shah</span>

            </div>

        </div>


    </div> <!--main ends-->


</div> <!--row ends-->


<div class="row1">

    <!-- side column starts -->
    <div class="side1">


        <div class="motto motto1">


            <div id="text" >
                <span>St. Martin's Island is a small island in the northeastern part of the Bay of Bengal</span>

            </div>



        </div>

        <div class="motto motto2">

            <div id="text" >

                <span>St. Martin's Island is the most famous tour destination for Bangladeshi people </span>

            </div>

        </div>

    </div>

    <!-- side column ends -->

    <!-- main column starts -->
    <div class="main1">


        <img id="img" src="sm1.jpg" alt="">


    </div> <!--main ends-->


</div> <!--row ends-->

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

<body>

<!-- Footer stars-->
<div class="footer">

    <div class="foot-sec">
    </div>


    <div class="foot-sec">
    </div>


    <div class="foot-sec">
    </div>
    <!-- Footer ends-->
</div>

<!-- flexible grid ends -->

</body>
</html>
