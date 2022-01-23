<head>
    @extends('style_bootstrap.style_links')
    <link rel="stylesheet" href="/mycss/otherPages/profile.css">
</head>

<body>
    <div id="profile_loader">
        <img src="https://s3.amazonaws.com/msc-media-linux-production/5e0ea029945d6.gif" alt="">
    </div>
    <section id="profile_content">
        <div class="profile_container">
            <div class="col-4 card1">
                <p class="userid" style="display:none;">{{$userProfileData->id}}</p>
                <img class="usersimg" src="{{asset('img/ProfilePic/'.$userProfileData->userimg)}}"
                    alt="user's's profile picture">
                <h1>Name : <label for="" class="usersname">{{$userProfileData->username}}</label> </h1>
                <h1>Email : <label for="" class="usersmail">{{$userProfileData->usermail}}</label> </h1>
                <!-- <h1>Area : <label for="">halishohor</label> </h1> -->
            </div>
            <div class="col-7 card2">
                <h1>Review :<label for="" class="usersreview"> {{$userProfileData->userreview}}</label> </h1>
                <h1>Package Name : <label for="" class="userspackage">{{$userProfileData->userpackage}}</label> </h1>
                <h1>Package Details : <label for="">{{$userProfileData->packagespeed}} Mbps shared</label> </h1>
                <h1>Package Cost : <label for="">{{$userProfileData->packagecosting}} 800 per month</label> </h1>
                <!-- <h1>Subcription Date : <label for="">5-12-2021</label> </h1> -->
                <div>
                    <button type="button" class="userProfile_edit" data-toggle="modal" data-target="#userProfileEdit"
                        data-idUpdate="'$userProfileData->id'">Edit</button>
                    <button><a href="logoutUser">Log out</a></button>
                </div>
            </div>
        </div>


        <!-- User edit modal -->
        <div class="modal fade" id="userProfileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('userProfile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="userid" id="userprofile_id"
                                aria-describedby="emailHelp" value="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="usersname" id="users_name"
                                    aria-describedby="emailHelp" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="usersreview" id="users_review" rows="4" cols="35"
                                    placeholder="Enter your review"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Upload photo</label>
                                <input type="file" class="form-control" name="usersimg" id="users_img">
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="/js/script.js"></script>
    <script>
    window.onload = function() {
        document.getElementById('profile_loader').style.display = "none";
        document.getElementById('profile_content').style.display = "block";
    }
    </script>
</body>