<?php $segment = Request::segment(1);?>

<style>

a:hover{
    text-decoration:none !important;
}

</style>

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <nav class="navbar navbar-expand-lg navbar-light">

                    @if($segment == "password")

                    @else
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{asset('images/Comp-1.gif')}}" class="img-fluid" alt="">
                    </a>
                    @endif

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto mr-auto">

                            <li class="nav-item <?php if($segment == "" || $segment == "home"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item <?php if($segment == "about"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('about')}}">About</a>
                            </li>
                            <!--<li class="nav-item <?php if($segment == "teacher"){ echo 'active'; } ?>">-->
                            <!--    <a class="nav-link" href="{{route('teacher')}}">Teacher</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item <?php if($segment == "provider"){ echo 'active'; } ?>">-->
                            <!--    <a class="nav-link" href="{{route('provider')}}">Provider</a>-->
                            <!--</li>-->
                            <li class="nav-item <?php if($segment == "contact"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                            </li>
                             <li class="nav-item <?php if($segment == "search"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('search')}}">Total Daycares</a>
                            </li>

                             <li class="nav-item <?php if($segment == "shared-gallery"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('sharedgallery')}}">Shared Gallery</a>
                            </li>

                            <li class="nav-item <?php if($segment == "shared-gallery"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('claimed_center')}}">Claimed Center</a>
                            </li>

                            @if(!Auth::check() && Auth::user()->role == '')
                            <li class="nav-item <?php if($segment == "signin"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('signin')}}"> Sign In </a>
                            </li>
                            @endif


                            @if(Auth::check() && Auth::user()->role == '3')
                            <li class="nav-item <?php if($segment == "job-board"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('job_board')}}"> Job Board </a>
                            </li>
                            @endif

                            @if(Auth::check() && Auth::user()->role == '4')
                            <li class="nav-item <?php if($segment == "job-board"){ echo 'active'; } ?>">
                                <a class="nav-link" href="{{route('job_board')}}"> View Job Board </a>
                            </li>
                            @endif

                        </ul>

                        <form class="form-inline my-2 my-lg-0">

                            @if(Auth::check())

                                @if(Auth::user()->role == '2')
                                <a href="{{route('account')}}" class="custom-btn" type="submit"> User Dashboard </a>
                                @elseif(Auth::user()->role == '3')
                                <a href="{{route('teacher_dashboard')}}" class="custom-btn" type="submit">  Teacher Dashboard </a>
                                @elseif(Auth::user()->role == '4')
                                <a href="{{route('provider.dashboard')}}" class="custom-btn" type="submit">  Provider Dashboard </a>
                                @elseif(Auth::user()->role == '1')
                                <a href="{{URL('admin')}}" class="custom-btn" type="submit">  Admin Dashboard </a>
                                @endif

                            @else

                                <a href="{{'joinnow'}}" class="custom-btn" type="submit" style="color:#fff !important;<?php if($segment == "joinnow"){ echo 'background-color:#f84c8f';} ?>"> Join </a>
                                <!--<a href="{{'become-a-teacher'}}" class="custom-btn" type="submit" style="color:#fff !important;<?php if($segment == "become-a-teacher"){ echo 'background-color:#f84c8f';} ?>">   Become A Teacher </a>-->
                                <!--<a href="{{'become-a-provider'}}" class="custom-btn" type="submit" style="color:#fff !important;<?php if($segment == "become-a-provider"){ echo 'background-color:#f84c8f';} ?>">  Become A Provider </a> -->

                            @endif

                        </form>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


<!-- <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/dashboard-2.css">

    <link rel="stylesheet" href="css/responsive.css">

       <link rel="shortcut icon" href="images/layer.png" />
    <title>Dashboard</title>
</head> -->


