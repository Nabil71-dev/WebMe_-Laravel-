<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>WebMe</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    @extends('style_bootstrap.style_links')
    <script src="https://www.momentcrm.com/embed"></script>
    <script>
    MomentCRM('init', {
        'teamVanityId': 'nabil71-dev',
        'doChat': true,
        'doTracking': true,
    });
    </script>
    <link href="/mycss/login_out.css" rel="stylesheet">
    <link href="/mycss/hamburger_nav.css" rel="stylesheet">
    <link href="/mycss/homePage.css" rel="stylesheet">
</head>

<body>
    <section>
        <div class="mainPage">
            <div class="container-lg">
                <header class="row pt-4">
                    <div class="col-4"><img src="img/logo.png"></div>
                    <navbar class="col-5 nav">
                        <a href="#">Contact</a>
                        <a href="{{route('allPackage')}}">Packages</a>
                        <a href="#">Complain</a>
                    </navbar>
                    <div class="col-3 hamburger">
                        <nav role='navigation'>
                            <div id="menuToggle">
                                <input type="checkbox" />
                                <span></span>
                                <span></span>
                                <span></span>
                                <ul id="menu">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Review</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#usermodal">User</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#myModal1">Admin</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>
                <div class="row mt-5">
                    <div class="left-Banner col-6">
                        <h1>Connect to world along with us</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is
                            simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <lebel><img src="/img/icon/android.png"></lebel>
                        <lebel><img src="/img/icon/windows.png"></lebel>
                        <lebel><img src="/img/icon/apple.png"></lebel>
                    </div>
                    <div class="right-illustration col-6">
                        <img src="/img/homeBg-illustration.png">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    @include('packages')
    @include('review')
    @include('complain')
    @include('footer')
</body>

</html>




<!-- The Admin Modal Login-->
<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal body -->
            <section class="container-lg">
                <div class="row login_container">
                    <img class="adminsign" src="/img/log_in--illustration.png">
                    <div class="col-6 login_container--left">
                        <h1>Hey Admin</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting <br> industry.
                        </p>
                    </div>
                    <div class="col-6 login_container--right">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <form action="{{route('admin-view')}}" method="post">
                            @csrf
                            @if(Session::has('admin_login'))
                            <p class="alert alert-danger">{{Session::get('admin_login')}}</p>
                            @endif
                            <h1>Sign in</h1>
                            <input class="input" type="text" placeholder=" E-mail" name="loginmail"
                                value="{{old('loginmail')}}"><br>
                            <span class="text-danger">@error('loginmail'){{$message}}@enderror</span><br>
                            <input class="input" type="password" placeholder=" Password" name="loginpass"><br>
                            <span class="text-danger">@error('loginpass'){{$message}}@enderror</span><br>
                            <input class="btn" type="submit" name="loginSubmit" value="Log in">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>


<!-- The User Modal Login-->
<div class="modal fade" id="usermodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal body -->
            <section class="container-lg">
                <div class="row login_container">
                    <img class="mysign" src="/img/Signup--illustration.png">
                    <div class="col-6 login_container--left">
                        <h1>New here..?</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        <button>Text us</button>
                    </div>
                    <div class="col-6 login_container--right">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <form action="{{route('userProfile-view')}}" method="post">
                            @csrf
                            @if(Session::has('user_login'))
                            <p class="alert alert-danger">{{Session::get('user_login')}}</p>
                            @endif
                            <h1>Sign in</h1>
                            <input class="input" type="text" placeholder=" E-mail" name="loginmail"
                                value="{{old('loginmail')}}"><br>
                            <span class="text-danger">@error('loginmail'){{$message}}@enderror</span><br>
                            <input class="input" type="password" placeholder=" Password" name="loginpass"><br>
                            <span class="text-danger">@error('loginpass'){{$message}}@enderror</span><br>
                            <input class="btn" type="submit" name="loginSubmit" value="Log in">
                            <p>Forget password..? <a href="{{route('forgot')}}">click here</a> </p>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>