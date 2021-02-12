<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/up.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/tours.css">
    <title>Welcome {{Auth::user()->userName}}</title>
</head>
<body>

<div id="upper-part">
    <div id="upp">
        <div id="left">
            <a href="#"><p id="name"><span style="color:#FF0000 ">G</span><span style="color: #FF7F00">H</span><span style="color: #FFFF00">URI</span><span style="color: #00FF00">FI</span><span style="color: rgb(32, 136, 255) ">RI</span><span style="color: rgb(121, 0, 207)"></span><span style="color: #8B00FF">.COM</span></p></a></div>
        <div id="right">
            <a href="{{ URL::to('logout') }}"><button id="logout-btn">Logout</button></a>
        </div>

    </div>
    <div id="nav">
        <ul>
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="/places">Find Places</a>
            </li>
            <li>
                <a href="/tours">Tours</a>
            </li>
            <li>
                <a href="/about">About</a>
            </li>
        </ul>
    </div>

</div>

<div class="main">
    <div id="cEvent">
        <button id="wPost">Create Event</button>
    </div>

    <!-- search option -->

    <div id="search">
        <form action="tourSearch">
            <input type="text" id="srch-area" name="search" placeholder="Search...">
            <select name="Order_by" id="select">
                <option value="desc">Sort By:</option>
                <option value="asc">Oldest</option>
                <option value="desc">Newest</option>
            </select> <button id="btn-search" type="submit">Search</button>
        </form>
    </div>

    @if($tours!=null)
        @foreach($tours as $tour)
            <div class="content-wrap">
                <h2>{{$tour->name}}</h2>
                <h5 id="destination">{{$tour->location}}</h5>
                <div id="content"> <div class="fakeimg" style="height:200px;">Image</div>
                    <div class="description"><p>{{$tour->tourDescription}}</p></div>
                </div>
                <button class="btn-join">Join</button>
            </div>
        @endforeach
    @endif
</div>

<!-- Modal for adding event-->
<div id="myModal" class="modal">

    <div class="modal-content">
        <span class="close">&times;</span>

        <form action="tourCreate" method="get">
            <input id="title" type="text" name="title" placeholder="Title"><br>
            <input id="location" type="text" name="location" placeholder="Destination"><br>
            <textarea name="textarea" id="posttext" placeholder="Tour description..."></textarea><br>
            <button id="postBtn" type="submit">Create</button>
        </form>

    </div>

</div>

<!-- Footer -->
<div class="footer">
    <div class="foot-sec">



    </div>
    <div class="foot-sec">

    </div>
    <div class="foot-sec">

    </div>
</div>

<!-- Scrit for modal -->
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("wPost");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>
