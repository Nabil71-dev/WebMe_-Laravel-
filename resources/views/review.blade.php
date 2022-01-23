<head>
    @extends('style_bootstrap.style_links')
    <link rel="stylesheet" href="/mycss/review.css">
</head>
<section>
    <div class="review">
        <div class="container-lg">
            <div class="row mt-4">
                <div class="col-8 review-banner">
                    <h1>Happy Client’s Talk</h1>
                    <h4>We give priority to our consumers thoughts</h4>

                    <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply
                        dummy text of the printing and typesetting industry. </p>
                    <img src="/img/review_illustration.png" alt="">
                </div>
                <div class="col-4">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="review_card review_card--card1">
                                    <h1>User reviews</h1>
                                </div>
                            </div>
                            @foreach($userData as $userdata)
                            @if($userdata->username!="")
                            <div class="carousel-item">
                                <div class="review_card review_card--cards">
                                    <img src="{{asset('img/ProfilePic/'.$userdata->userimg)}}" alt="Users's pic">
                                    <h1>{{$userdata->username}}</h1>
                                    <p>{{$userdata->userreview}}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="map_container">
    <h1>Visit us</h1>
    <p><iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.8699268675164!2d91.7823171142682!3d22.282916549158188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acdefa23107831%3A0x8128792ef0ace4ea!2sHospital%20Gate%20Bus%20Stop!5e0!3m2!1sen!2sbd!4v1638528375785!5m2!1sen!2sbd"
            allowfullscreen="" loading="lazy"></iframe></p>
</section>