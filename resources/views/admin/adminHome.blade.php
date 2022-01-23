<head>
    @extends('style_bootstrap.style_links')
    <link rel="stylesheet" href="/mycss/adminPages/adminHome.css">
    <link rel="stylesheet" href="/mycss/adminPages/adminProfile.css">
</head>

<body>
    <div id="admin_loader">
        <img src="https://s3.amazonaws.com/msc-media-linux-production/5e0ea029945d6.gif" alt="">
    </div>
    <section id="admin_content">
        <div class="admin_home">
            <div class="side_nav">
                <div class="nav_head">
                    <img src="/img/logo.png" alt="">
                    <div>
                        <label>{{$admindata->adminmail}}<br> <a onclick="toggleVisibility('Menu');"
                                href="#">Profile</a></label>
                    </div>
                </div>
                <nav class="nav_body">
                    <div class="nav-side-menu">
                        <div class="menu-list">
                            <ul id="menu-content" class="nav_container menu-content">

                                <li data-toggle="collapse" data-target="#products" class="collapsed">
                                    <a href="#">Admin <img class="arrow" src="/img/down_arrow.png" alt=""></a>
                                </li>
                                <ul class="sub-menu collapse" id="products">
                                    <li><a onclick="toggleVisibility('Menu1');" href="#">Add admin</a></li>
                                    <li><a onclick="toggleVisibility('Menu2');" href="#">Admin list</a></li>
                                </ul>

                                <li data-toggle="collapse" data-target="#user" class="collapsed">
                                    <a href="#">User <img class="arrow" src="/img/down_arrow.png" alt=""></a>
                                </li>
                                <ul class="sub-menu collapse" id="user">
                                    <li><a onclick="toggleVisibility('Menu3');" href="#">Add user</a></li>
                                    <li><a onclick="toggleVisibility('Menu4');" href="#">User list</a></li>
                                </ul>

                                <li data-toggle="collapse" data-target="#package" class="collapsed">
                                    <a href="#"> Package <img class="arrow" src="/img/down_arrow.png" alt=""></a>
                                </li>
                                <ul class="sub-menu collapse" id="package">
                                    <li><a onclick="toggleVisibility('Menu5');" href="#">Add package</a></li>
                                    <li><a onclick="toggleVisibility('Menu6');" href="#">Package list</a></li>
                                </ul>

                                <li data-toggle="collapse" data-target="#area" class="collapsed">
                                    <a href="#"> Arae <img class="arrow" src="/img/down_arrow.png" alt=""></a>
                                </li>
                                <ul class="sub-menu collapse" id="area">
                                    <li><a onclick="toggleVisibility('Menu7');" href="#">Add area</a></li>
                                    <li><a onclick="toggleVisibility('Menu8');" href="#">Area list</a></li>
                                </ul>
                                <li><a onclick="toggleVisibility('Menu9');" href="#">Complains</a></li>
                                <li><a onclick="toggleVisibility('Menu10');" href="#">Forgot req.</a></li>
                                <li><a
                                        href="https://www.momentcrm.com/team/nabil71-dev/inbox/i_hC0qs2VeOJA?userId=e_2yO4JXZcwuF&convoId=c_RxAnNSiGArc&status=open">User
                                        chats</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="Menu" style="display: none; margin:auto;">
                <div class="card1">
                    <p class="id" style="display:none;">{{$admindata->id}}</p>
                    <img class="adminspic" src="{{asset('img/ProfilePic/'.$admindata->adminpic)}}"
                        alt="admin's profile picture">
                    <p><strong>Name : </strong><label class="adminsname">{{$admindata->adminname}}</label> </p>
                    <p><strong>Email : </strong><label>{{$admindata->adminmail}}</label> </p>
                    <p><strong>Assigned Area : </strong><label>{{$admindata->adminarea}}</label> </p>
                    <div>
                        <button type="button" class="adminProfile_edit" data-toggle="modal" data-target="#adminProfile"
                            data-idUpdate="'$admindata->id'">Edit</button>
                        <button><a href="logoutAdmin">Log out</a> </button>
                    </div>
                </div>
            </div>

            <div id="Menu1" style="display: none; margin:auto;">
                @if(Session::has('admin_add'))
                <p class="alert alert-success">{{Session::get('admin_add')}}</p>
                @endif
                <div class="adminform_box">
                    <h1>Add admin</h1>
                    <form method="post" action="{{route('admin.add')}}">
                        @csrf
                        <input class="form_input" name="adminname" type="text" placeholder=" Enter name of new admin"
                            value="{{old('adminname')}}"><br>
                        <span class="text-danger">@error('adminname'){{$message}}@enderror</span> <br>
                        <input class="form_input" name="adminmail" type="email" placeholder=" Enter email for new admin"
                            value="{{old('adminmail')}}"> <br>
                        <span class="text-danger">@error('adminmail'){{$message}}@enderror</span> <br>
                        <input class="form_input" name="adminarea" type="text" placeholder=" Set area for new admin"
                            value="{{old('adminarea')}}"><br>
                        <span class="text-danger">@error('adminarea'){{$message}}@enderror</span> <br>
                        <input class="form_input" name="adminpass" type="password"
                            placeholder=" Set password for new admin"><br>
                        <span class="text-danger">@error('adminpass'){{$message}}@enderror</span> <br>
                        <input class="form_submit" name="addadmin" type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div id="Menu2" style="display: none; margin:auto;">

                @if(Session::has('admin_delete_text'))
                <p class="alert alert-danger">{{Session::get('admin_delete_text')}}</p>
                @endif
                <div class="table_box">
                    <h2>Admin's List</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Assigned Office</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td class="id" style="display:none;">{{$data->id}}</td>
                                <td class="adminname">{{$data->adminname}}</td>
                                <td class="adminmail">{{$data->adminmail}}</td>
                                <td class="adminarea">{{$data->adminarea}}</td>
                                <td class="adminpic"><img src="{{asset('img/ProfilePic/'.$data->adminpic)}}"
                                        alt="admin pic" width="20px" height="40px"></td>
                                <td><a type="button" class="btn btn-outline-primary admin_edit" data-toggle="modal"
                                        data-idUpdate="'$data->id'" data-target="#editadmin">Edit</a>
                                    <a type="button" class="btn btn-outline-danger" href="/delete_admin/{{$data->id}}"
                                        onclick="return confirm('Are you sure..?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="Menu3" style="display: none; margin:auto;">
                @if(Session::has('user_add'))
                <p class="alert alert-success">{{Session::get('user_add')}}</p>
                @endif
                <div class="adminform_box">
                    <h1>Add user</h1>
                    <form method="post" action="{{route('user.add')}}">
                        @csrf
                        <input class="form_input" type="email" name="usermail" placeholder=" Enter email for new user"
                            value="{{old('usermail')}}">
                        <br>
                        <span class="text-danger">@error('usermail'){{$message}}@enderror</span> <br>
                        <input class="form_input" type="password" name="userpass"
                            placeholder=" Set password for new user"><br>
                        <span class="text-danger">@error('userpass'){{$message}}@enderror</span> <br>
                        <input class="form_input" type="text" name="userpackage" placeholder=" User's selected package"
                            value="{{old('userpackage')}}"><br>
                        <span class="text-danger">@error('userpackage'){{$message}}@enderror</span> <br>
                        <input class="form_submit" type="submit" name="adduser" value="Submit">
                    </form>
                </div>
            </div>
            <div id="Menu4" style="display: none; margin:auto;">
                <div class="table_box">
                    <h2>User's List</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Picture</th>
                                <th>Package</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($values as $value)
                            <tr>
                                <td class="id" style="display:none;">{{$value->id}}</td>
                                <td class="username">{{$value->username}}</td>
                                <td class="usermail">{{$value->usermail}}</td>
                                <td class="userpass">{{$value->userpass}}</td>
                                <td class="userimg"> <img style="height:30px;width:30px;"
                                        src="{{asset('img/ProfilePic/'.$value->userimg)}}" alt="user pic"></td>
                                <td class="userpackage">{{$value->userpackage}}</td>
                                <td><a type="button" class="btn btn-outline-primary user_edit" data-toggle="modal"
                                        data-idUpdate="'$value->id'" data-target="#updateuser">Edit</a>
                                    <a type="button" class="btn btn-outline-danger" href="/delete_user/{{$value->id}}"
                                        onclick="return confirm('Are you sure..?')">Delete</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="Menu5" style="display: none; margin:auto;">
                @if(Session::has('package_add'))
                <p class="alert alert-success">{{Session::get('package_add')}}</p>
                @endif
                <div class="adminform_box">
                    <h1>Add Package</h1>
                    <form method="post" action="{{route('package.add')}}">
                        @csrf
                        <input class="form_input" type="text" name="packagename" placeholder=" Enter new package's name"
                            value="{{old('packagename')}}"> <br>
                        <span class="text-danger">@error('packagename'){{$message}}@enderror</span> <br>
                        <input class="form_input" type="text" name="packagespeed"
                            placeholder=" Enter speed range of new data pack" value="{{old('packagespeed')}}"><br>
                        <span class="text-danger">@error('packagespeed'){{$message}}@enderror</span> <br>
                        <input class="form_input" type="text" name="packageactivity" placeholder=" Offer or Regular"
                            value="{{old('packageactivity')}}"><br>
                        <span class="text-danger">@error('packageactivity'){{$message}}@enderror</span> <br>
                        <input class="form_input" type="text" name="packagecode"
                            placeholder=" Enter tag-name for new pack" value=""><br>
                        <span class="text-danger">@error('packagecode'){{$message}}@enderror</span> <br>
                        <input class="form_input" type="text" name="packagecosting"
                            placeholder=" Enter cost of new pack" value=""><br>
                        <span class="text-danger">@error('packagecosting'){{$message}}@enderror</span> <br>
                        <input class="form_submit" type="submit" name="addpackage" value="Submit">
                    </form>
                </div>
            </div>
            <div id="Menu6" style="display: none; margin:auto;">
                <div class="table_box">
                    <h2>Package's List</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Range</th>
                                <th>Offer/regular</th>
                                <th>Package-tag</th>
                                <th>Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                            <tr>
                                <td class="id" style="display:none;">{{$result->id}}</td>
                                <td class="packagename">{{$result->packagename}}</td>
                                <td class="packagespeed">{{$result->packagespeed}}</td>
                                <td class="packageactivity">{{strtoupper($result->packageactivity)}}</td>
                                <td class="packagecode">{{$result->packagecode}}</td>
                                <td class="packagecosting">{{$result->packagecosting}}</td>
                                <td><a type="button" class="btn btn-outline-primary pack_edit" data-toggle="modal"
                                        data-idUpdate="'$result->id'" data-target="#updatePackage">Edit</a>
                                    <a type="button" class="btn btn-outline-danger"
                                        href="/delete_package/{{$result->id}}"
                                        onclick="return confirm('Are you sure..?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="Menu7" style="display: none; margin:auto;">
                @if(Session::has('area_add'))
                <p class="alert alert-success">{{Session::get('area_add')}}</p>
                @endif
                <div class="adminform_box">
                    <h1>Add area</h1>
                    <form method="post" action="{{route('area.add')}}">
                        @csrf
                        <input class="form_input" type="text" name="areaname" placeholder=" Enter new area name"
                            value="{{old('areaname')}}"> <br>
                        <span class="text-danger">@error('areaname'){{$message}}@enderror</span> <br>
                        <input class="form_input" type="text" name="areadetails" placeholder=" Area office details"
                            value="{{old('areadetails')}}"><br>
                        <span class="text-danger">@error('areadetails'){{$message}}@enderror</span> <br>
                        <input class="form_submit" type="submit" name="addarea" value="Submit">
                    </form>
                </div>
            </div>
            <div id="Menu8" style="display: none; margin:auto;">
                <div class="table_box">
                    <h2>Service Area's List</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Area Name</th>
                                <th>Area Office Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($final as $area_data)
                            <tr>
                                <td class="id" style="display:none;">{{$area_data->id}}</td>
                                <td class="areaname">{{$area_data->areaname}}</td>
                                <td class="areadetails">{{$area_data->areadetails}}</td>
                                <td><a type="button" class="btn btn-outline-danger"
                                        href="/delete_area/{{$area_data->id}}"
                                        onclick="return confirm('Are you sure..?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="Menu9" style="display: none; margin:auto;">
                <div class="table_box">
                    <h2>Complain List</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Complainee</th>
                                <th>Complain</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($temp as $temp_data)
                            <tr>
                                <td class="id" style="display:none;">{{$temp_data->id}}</td>
                                <td class="complainee">{{$temp_data->complainee}}</td>
                                <td class="complain">{{$temp_data->complain}}</td>
                                <td><a type="button" class="btn btn-outline-danger"
                                        href="/delete_complain/{{$temp_data->id}}"
                                        onclick="return confirm('Are you sure..?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="Menu10" style="display: none; margin:auto;">
                <div class="table_box">
                    <h2>Forgot Pass User's</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mail</th>
                                <th>Package</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fpasses as $temp_fpass)
                            <tr>
                                <td class="id" style="display:none;">{{$temp_fpass->id}}</td>
                                <td class="fmail">{{$temp_fpass->fmail}}</td>
                                <td class="fpackname">{{$temp_fpass->fpackname}}</td>
                                <td><a type="button" class="btn btn-outline-danger"
                                        href="/delete_forgot/{{$temp_fpass->id}}"
                                        onclick="return confirm('Are you sure..?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="adminform_box">
                    <h1>Send pass in mail</h1>
                    <form method="post" action="{{route('sendforgot_pass')}}">
                        @csrf
                        <input class="form_input" type="text" name="sendmail" placeholder=" Enter user's mail" value="">
                        <br>
                        <span class="text-danger">@error('sendmail'){{$message}}@enderror</span> <br>
                        <textarea rows="4" cols="35" class="form_input" type="text" name="sendmailbody"
                            placeholder=" Enter new password for user and send it through mail" value=""></textarea><br>
                        <span class="text-danger">@error('sendmailbody'){{$message}}@enderror</span> <br>
                        <input class="form_submit" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>


        <!--Admin Profile-->
        <div class="modal fade" id="adminProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Edit your profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('adminProfile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" class="form-control" name="id" id="adminprofile_id"
                                aria-describedby="emailHelp" value="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="adminsname" id="admin_name"
                                    placeholder="Enter your name" value="">
                            </div>
                            <div class="form-group">
                                <label for="photo">Upload photo</label>
                                <input type="file" class="form-control" name="adminspic" id="admin_pic">
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!--Modal User-->
        <div class="modal fade" id="updateuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Admin's work area</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('user.update')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="id" id="user_id"
                                aria-describedby="emailHelp" value="">
                            <div class="form-group">
                                <input type="name" class="form-control" name="usermail" id="user_mail"
                                    placeholder="Enter new mail for user" value="">
                            </div>
                            <div class="form-group">
                                <input type="pass" class="form-control" name="userpass" id="user_pass"
                                    placeholder="Enter new pass for user" value="">
                            </div>
                            <div class="form-group">
                                <input type="name" class="form-control" name="userpackage" id="user_package"
                                    placeholder="Enter new package for user" value="">
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal Admin-->
        <div class="modal fade" id="editadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Admin's work area</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.update')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="id" id="admin_id"
                                aria-describedby="emailHelp" placeholder="Enter email" value="">
                            <div class="form-group">
                                <input type="name" class="form-control" name="adminarea" id="admin_area"
                                    placeholder="Enter new Area name" value="">
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal Package-->
        <div class="modal fade" id="updatePackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Package List</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('package.update')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="pack_id" name="id"
                                aria-describedby="emailHelp" placeholder="Enter email" value="">
                            <div class="form-group">
                                <input type="name" class="form-control" id="pack_name" name="packagename"
                                    placeholder="Enter new Package name" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pack_range" name="packagespeed"
                                    placeholder="Enter new package range" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pack_type" name="packageactivity"
                                    placeholder="Enter new package action" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pack_tag" name="packagecode"
                                    placeholder="Enter new package tag" value="">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pack_cost" name="packagecosting"
                                    placeholder="Enter new package cost" value="">
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>