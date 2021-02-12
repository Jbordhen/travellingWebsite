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
        <div id="left"><a href="/home"><p id="name"><span style="color:#FF0000 ">G</span><span style="color: #FF7F00">H</span><span style="color: #FFFF00">URI</span><span style="color: #00FF00">FI</span><span style="color: rgb(32, 136, 255) ">RI</span><span style="color:  rgb(121, 0, 207)"></span><span style="color:  #8B00FF">.COM</span></p></a></div>

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
        <!-- chatbox starts -->
        <section class="chat">
            <h1>
                Shout Box
            </h1>
            <div class="messages">
                <div class="message">
                    <span class="date">22-23</span>:&nbsp;
                    <span class="author">someone</span>&nbsp;
                    <span class="content">Lorem ipsum dolor sit amet.</span>

                </div>

            </div>

            <div class="user-inputs" id="msg-form">
                <form action="app.php?task=write" method="post">

                    <input type="text" name="content" id="content" placeholder="type anything">
                    <button type="submit" id="btn-msg">send</button>
                </form>

            </div>
        </section>
        <!-- chatbox ends -->

        <h2>Top Stories</h2>
        <h5>Top Photo</h5>
        <div class="fakeimg" style="height:200px;">Image</div>
        <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
        <h3>More Text</h3>
        <p>Lorem ipsum dolor sit ame.</p>
        <div class="fakeimg" style="height:60px;">Image</div><br>
        <div class="fakeimg" style="height:60px;">Image</div><br>
        <div class="fakeimg" style="height:60px;">Image</div>
    </div>

    <!-- side column ends -->

    <!-- main column starts -->
    <div class="main">


        <button id="wPost">Write Post</button>

        <!-- search option -->
        <div id="search">
            <form action="/search">
                <input type="text" id="srch-area" name="search" placeholder="Search...">
                <select name="Order by" id="select">
                    <option value="desc">Sort By:</option>
                    <option value="asc">Oldest</option>
                    <option value="desc">Newest</option>
                </select>
                <button id="btn-search" type="submit">Search</button>
            </form>
        </div>


        <hr>


        <!-- write post -->


        <!-- The Modal post form -->
        <div id="myModal" class="modal">

            <div class="modal-content">
                <span class="close">&times;</span>

                <form action="/create" method="post">
                    @csrf
                    <input id="title" type="text" name="title" placeholder="Title"><br>
                    <textarea name="textarea" id="posttext"  placeholder="Write Post...."></textarea><br>
                    <button id="postBtn" type="submit">Post</button>
                </form>

            </div>

        </div>



        <!-- post starts -->


        @if($posts!=null)
            @foreach($posts as $post)
                @if(session('status'))
                    <div class="alert-danger">{{session('status')}}</div>
                @endif
                <div class="post">
                    <div>
                        <h2>{{$post->postTitle}}</h2>
                        <a id="uId" href="#" >{{DB::table('users')->find($post->userId)->userName}}</a>
                    </div>
                    <br>
                    <!-- <h5>Title description, Jul 14, 2019</h5> -->
                    <div class="fakeimg" style="height:200px;">Image</div>
                    <!-- <p>Image description..</p> -->
                    <p>{{$post->postDescription}}</p>
                    @if($post->userId==Auth::user()->id)
                        <div>
                            <form action="/delete" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="post" value="{{$post->id}}">
                                <button type="submit" id="dPost-btn">Delete</button>
                            </form>
                            <button id="edit-btn" >Edit</button>

                        </div>
                        <!-- edit modal form -->

                        <div id="modal-edit" class="modal">

                            <div class="modal-edit-content">
                                <span class="x">&times;</span>

                                <form action="/edit" method="get">
                                    @csrf
                                    <input type="hidden" name="postId" value={{$post->id}}>
                                    <input id="title" type="text" name="title" placeholder="" value="{{$post->postTitle}}"><br>
                                    <textarea name="textarea" id="posttext" placeholder="">{{$post->postDescription}}</textarea><br>
                                    <button id="postBtn" type="submit">Done</button>
                                </form>

                            </div>

                        </div>
                    @endif

                    @php
                    $comments=DB::table('comments')->select('userId','commentBody')->where('postId',$post->id)->get();
                    //@dd($comments);
                    @endphp

                    <!-- write comment -->

                    <div id="write-comment">
                        @foreach($comments as $comment)
                        <div id="comment">
                            <span id="com-id">{{DB::table('users')->find($comment->userId)->userName}}:</span>
                            <span id="com-content">{{$comment->commentBody}}</span>
                        </div>
                        @endforeach
                        <form action="/comment" method="get">
                            @csrf
                            <input type="hidden" name="postId" value={{$post->id}}>
                            <input type="hidden" name="userId" value={{Auth::user()->id}}>
                            <textarea id="wCom" name="comment" placeholder="Write Comment"></textarea><br>
                            <button id="com-btn" type="submit">Comment</button>
                        </form>

                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>

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


<!-- Script for modal -->
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
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<!--edit modal call-->

<script>
    // Get the modal
    var modal1 = document.getElementById("modal-edit");

    // Get the button that opens the modal
    var btn1 = document.getElementById("edit-btn");

    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("x")[0];

    // When the user clicks the button, open the modal
    btn1.onclick = function() {
        modal1.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal1.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
</script>
</body>
</html>
