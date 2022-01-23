<head>
    @extends('style_bootstrap.style_links')
    <link rel="stylesheet" href="/mycss/packages.css">
</head>

<section>
    <div class="package_container">
        <div class="container-lg mt-4">
            <div class="row">
                <div class="col-12">
                    <h1 class="package-heading">Package</h1>
                </div>
                <div class="col-12">
                    <p class="package-paragraph">Let’s join to our family with the following package which suit’s you
                        the most</p>
                </div>
            </div>
            <div class="row mt-4 d-flex justify-content-center">
                @foreach($allPack as $v=>$defPack)
                @if($defPack->packageactivity =='default')
                <div class="col-3 package_card">
                    <div class="card_tag text-center">
                        <p>{{$defPack->packagename}}</p>
                    </div>
                    <div class="card_body">
                        <h1>{{$defPack->packagespeed}}</h1>
                        <p>Mbps <br> Unlimited</p>
                    </div>
                    <div class="card_button d-flex justify-content-center">
                        <button type="button" data-toggle="modal"
                            data-target="#exampleModalLong{{$v+1}}">Subscribe</button>
                    </div>
                </div>
                @endif

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong{{$v+1}}" tabindex="-1" role="dialog"
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
                                <p class="text-success">If you pay 4 or more month's bill at once then line charge will
                                    be free and The ammount will be = <strong>{{$defPack->packagecosting*4}}</strong>
                                </p>
                                <p id="pack_name"><strong> Package Name : </strong>{{$defPack->packagename}}</p>
                                <p id="pack_tag"> <strong> Package code : </strong>{{$defPack->packagecode}}</p>
                                <p id="pack_range"><strong> Package details : </strong>{{$defPack->packagespeed}}Mbps
                                </p>
                                <p id="pack_cost"><strong> Package cost : </strong>
                                    <strong>{{$defPack->packagecosting}}</strong> /= per
                                    month + line charge <strong>500</strong> <br>
                                    The total cost for this Package will be <strong>
                                        {{$defPack->packagecosting+500}}</strong>
                                </p>
                                <strong style="font-size:18px;" class="text-info">If u want to subscribe this package
                                    please
                                    text us
                                    with the package code</strong>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>