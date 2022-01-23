<head>
    @extends('style_bootstrap.style_links')
    <link rel="stylesheet" href="/mycss/otherPages/allpackage.css">
</head>

<body>
    <section >
        <nav class="package_nav">
            <ul>
                <li><a href="{{route('homePage')}}">Home</a></li>
                <li><a href="">All Packages</a></li>
                <li><a href="">Offer</a></li>
            </ul>
        </nav>
        <div class="allpackage_container">
            @foreach($allPack as $k=>$mainPack)
            @if($mainPack->packageactivity =='offer')
            <div class="package_card">
                <div class="card_tag">
                    <p>{{strtoupper($mainPack->packageactivity)}}</p>
                </div>
                <h1 class="card_header">{{$mainPack->packagename}}</h1>
                <h1 class="pack_size">{{$mainPack->packagespeed}}</h1>
                <p>Mbps<br>Unlimited</p>
                <a type="button" class="pack_details" data-toggle="modal"
                    data-target="#packageModalLong{{$k+1}}">subscribe</a>
            </div>
            @else
            <div class="package_card">
                <h1 class="card_header">{{$mainPack->packagename}}</h1>
                <h1 class="pack_size">{{$mainPack->packagespeed}}</h1>
                <p>Mbps<br>Unlimited</p>
                <a type="button" class="pack_details" data-toggle="modal"
                    data-target="#packageModalLong{{$k+1}}">subscribe</a>
            </div>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="packageModalLong{{$k+1}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Package Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-success">If you pay 4 or more month's bill at once then line charge will be
                                free and The ammount will be = <strong>{{$mainPack->packagecosting*4}}</strong></p>
                            <p><strong> Package Name : </strong> {{$mainPack->packagename}}</p>
                            <p><strong> Package code : </strong>{{$mainPack->packagecode}}</p>
                            <p><strong> Package details : </strong>{{$mainPack->packagespeed}}Mbps</p>
                            <p><strong> Package cost : </strong> <strong>{{$mainPack->packagecosting}}</strong> /= per
                                month + line charge
                                <strong>500</strong> <br>
                                The total cost for this Package will be
                                <strong>{{$mainPack->packagecosting+500}}</strong>
                            </p>
                            <strong style="font-size:18px;" class="text-info">If u want to subscribe this package please
                                text us
                                with the package code</strong>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</body>