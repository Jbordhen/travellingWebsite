<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/mainAnimate.css">
    <title>Landing Page{{ $errors->first('email') }}
        {{ $errors->first('password') }}</title>
</head>
<body>




<div id="row">

    <!-- main part -->

    <div id="main">

        <div id="animate">


            <h1 id="data">
                <a href="" class="typewrite" data-period="2000" data-type='[ "Welcome", "We Are Ghurifiri.com", "We Make Your Tour Smooth" ]'>
                    <span class="wrap"></span>
                </a>
            </h1>
            <br>

            <button id="lg" type="button">Login</button>
            <button id="su" type="button">Sign Up</button>


        </div>


    </div>



    <div id="side">


        <div id="login">
            <div>

                <h2>Log In</h2><br>
                <form action="/login" method="post">
                    @csrf
                    Email: <br> <input type="email" name="email"><br>
                    Password: <br> <input type="password" name="password"><br>
                    <button id="btn-login" type="submit">Log in</button>

                </form>
            </div>

        </div>


        <div id="signup">
            <div>
                <h2>Sign Up</h2><br>
                <form action="/signup" method="post">
                    @csrf
                    User Name:<br> <input type="text" name="userName"><br>
                    Password:<br> <input type="password" name="password"><br>
                    Email:<br> <input type="email" name="email"><br>
                    Phone Number: <br><input type="text" name="phoneNo"><br>
                    <button id="btn-sign" type="submit">Sign up</button>

                </form>
            </div>

        </div>


    </div>



</div>




<!-- main animate js -->

<script>

    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };

</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>

    $(document).ready(function(){
        $("#signup").hide();
        $("#login").hide();
        $("#su").click(function(event){
            event.preventDefault();
            // $("#login").fadeToggle("slow");
            $("#signup").toggle();
            $("#login").hide();

        });

        $("#lg").click(function(event){
            event.preventDefault();
            // $("#login").fadeToggle("slow");
            $("#login").toggle();
            $("#signup").hide();

        });
    });

</script>


</body>
</html>