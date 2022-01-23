<head>
    @extends('style_bootstrap.style_links')
    <link rel="stylesheet" href="/mycss/complain.css">
</head>
<section>
    <div class="complain_container">
        <div class="container-sm">
            <div class="complain_header d-flex justify-content-center">
                <h1>Cause an upset..?</h1>
            </div>
            <div class="row complain_body">
                <div class="col-4 complain_box">
                    <form action="{{route('complain.add')}}" method="post">
                        @csrf
                        <input class="complain_input" type="email" name="complainee" placeholder=" E-mail"
                            value="{{old('complainee')}}">
                        <textarea class="complain_input" name="complain" rows="4" cols="35"
                            placeholder=" Enter your Complain" value="{{old('complain')}}"></textarea>
                        <div class="d-flex justify-content-center">
                            <input class="complain_button" type="submit" name="complainSubmit" value="Send it">
                        </div>
                    </form>
                    @if(Session::has('complain_add'))
                    <label class="alert alert-success">{{Session::get('complain_add')}}</label>
                    @endif
                </div>
                <div class="col-5 complain_banner">
                    <p>Tell us what kind of problem you are facing in details with your valid Phone number and your used
                        user name we will contact you soon .</p>
                    <img src="/img/complain_illustration.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>