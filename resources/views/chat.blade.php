<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

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
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- FONTS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/profile.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/dashboard-2.css">
    <!--  <link rel="stylesheet" href="css/butter.css"> -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/responsive.css">

    <link rel="shortcut icon" href="http://127.0.0.1:8000/images/layer.png" />

    <!--Toaster Css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/vendors/dropify/dist/css/dropify.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


    <title>Dashboard</title>

    <style>
        .profilein1 input {
            outline: none;
            font-size: 11px;
            width: 240px;
            border: none;
            margin-left: 10px;
            color: #000 !important;
            background-color: unset;
        }


        a:hover {
            color: #000 !important;
            text-decoration: none;
        }


        .menu_active {

            background: #d8dbe4;
            padding: 20px;
            border-radius: 15px;
            font-size: 20px !important;

        }
    </style>

</head>
<meta name="csrf-token" content="2WOdTjzfq08jf7LJZ8grAtofpuhmTe9kzpNVoIya">

<style>
    .fill-5 {
        animation: fill 5s linear 1;
    }

    .fill-4 {
        animation: fill 4s linear 1;
    }

    .fill-3 {
        animation: fill 3s linear 1;
    }

    .fill-2 {
        animation: fill 2s linear 1;
    }

    .fill-1 {
        animation: fill 1s linear 1;
    }

    @keyframes fill {
        0% {
            width: 0%;
        }

        100% {
            width: 100%;
        }
    }

    .progress {
        --bs-progress-height: 1rem;
        --bs-progress-font-size: 0.75rem;
        --bs-progress-bg: #e9ecef;
        --bs-progress-border-radius: 0.375rem;
        --bs-progress-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
        --bs-progress-bar-color: #fff;
        --bs-progress-bar-bg: #0d6efd;
        --bs-progress-bar-transition: width 0.6s ease;
        display: flex;
        height: var(--bs-progress-height);
        overflow: hidden;
        font-size: var(--bs-progress-font-size);
        background-color: var(--bs-progress-bg);
        border-radius: var(--bs-progress-border-radius);
    }

    .progress-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: hidden;
        color: var(--bs-progress-bar-color);
        text-align: center;
        white-space: nowrap;
        background-color: var(--bs-progress-bar-bg);
        transition: var(--bs-progress-bar-transition);
    }


    .newfeed_progress {
        background-color: #F5F7FC;
        border: 8px;
        padding: 8px 8px;
        margin-top: 13px;
    }

    li.nav-item.active {
        background-color: #b8bab7;
        border-radius: 10px;
    }

    .myaccount-tab-menu.nav a {
        display: block;
        padding: 20px;
        font-size: 16px;
        align-items: center;
        width: 100%;
        font-weight: bold;
        color: black;
    }

    .myaccount-tab-menu.nav a i {
        padding-right: 10px;
        /* background-color: #5798fc; */
    }

    .myaccount-tab-menu.nav {
        border: 1px solid;
    }

    .myaccount-tab-menu.nav .active,
    .myaccount-tab-menu.nav a:hover {
        background-color: #5798fc;
        color: white;
    }

    .account-details-form label.required {
        width: 100%;
        font-weight: 500;
        font-size: 18px;
    }

    .account-details-form input {
        border-width: 1px;
        border-color: white;
        border-style: solid;
        padding-left: 15px;
        color: black;
        width: 100%;
        border-radius: 3px;
        background-color: rgb(255, 255, 255);
        height: 52px;
        padding-left: 15px;
        margin-bottom: 30px;
        color: #000000;
        font-size: 15px;
    }

    .account-details-form legend {
        font-family: CottonCandies;
        font-size: 50px;
    }

    .editable {
        position: relative;
    }

    .editable-wrapper {
        position: absolute;
        right: 0px;
        top: -50px;
    }

    .editable-wrapper a {
        background-color: #17a2b8;
        border-radius: 50px;
        width: 35px;
        height: 35px;
        display: inline-block;
        text-align: center;
        line-height: 35px;
        color: white;
        margin-left: 10px;
        font-size: 16px;
    }

    .editable-wrapper a.edit {
        background-color: #007bff;
    }

    .profilebg1 {
        margin-top: -16px;
    }

    .chating_section {
        padding-top: 30px;
        flex-direction: column;
        display: flex;
        justify-content: space-between;
        height: 100%;
    }

    .messg-info .right_messg {
        margin-bottom: 30px;
        width: auto;
        margin-left: 50px;
    }

    .messg-info .para_chat {
        border: none;
        /* padding-top: 35px !important; */
        background: #e9ecef78;
        position: relative;
        z-index: 0;
        /* height: 65px; */
        /* padding-right: 50px !important; */
        /* padding-left: 15px; */
        /* padding-bottom: 18px; */
        border-radius: 10px;
    }

    .bottom-type-input {
        position: relative;
        z-index: 0;
    }

    .bottom-type-input input {
        border: 1px solid #0000003b;
        border-radius: 5px;
        background: #e9ecef78;
        margin-bottom: 18px;
    }

    .bottom-type-input button {
        position: absolute;
        z-index: 0;
        right: 0;
        top: 0px;
    }

    .chat_item h6 {
        color: black;
        font-size: 25px;
        font-weight: 900;
    }

    .tab-content {
        height: 750px;
        overflow-y: scroll;
    }

    .tab-content::-webkit-scrollbar-thumb {
        background: #25D366;
    }

    .messg-info .left_messg {
        width: auto;
        margin-left: 50px;
        margin-bottom: 30px;
        justify-content: end !important;
    }

    .messg-info .time_show {
        position: relative;
        z-index: 0;
        display: flex;
        align-items: baseline;
        justify-content: start;
        gap: 20px;
    }

    #dynamicTextarea span {
        /* position: absolute; */
        z-index: 0;
        right: 10px;
        top: 5px;
    }

    .chat_picture {
        /* display: flex; */
        align-items: center;
        gap: 20px;
        /* position: absolute; */
        z-index: 0;
        left: -50px;
    }

    .chat_picture p {
        margin: 0;
        line-height: 0;
    }

    #dynamicTextarea p {
        margin: 0;
        /* position: absolute; */
        z-index: 0;
        top: 5px;
        left: 10px;
        font-size: 22px;
        font-weight: 600;
        color: black;
    }

    .left_messg .para_chat {
        /* padding-left: 50px !important; */
        /* padding-right: 15px !important; */
    }

    .show_mssg {
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* position: absolute; */
        z-index: 0;
        top: 5px;
        gap: 10px;
        width: 100%;
        padding: 2px 15px;
    }

    .left_messg .show_mssg {
        flex-flow: row-reverse;
    }

    .show_result {
        padding-top: 5px !important;
        padding-right: 50px !important;
        padding-left: 15px;
        padding-bottom: 10px;
    }

    .left_messg .show_result {
        /* padding-right: 15px !important; */
        /* padding-left: 50px !important; */
    }

    .chat_picture img {
        width: 50px;
        height: 50px;
        max-width: 50px;
    }

    .left_messg div#dynamicTextarea {
        background: #25D366;
        color: white !important;
    }

    .left_messg #dynamicTextarea p {
        color: white !important;
    }
</style>

<body>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/inner.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/responsive.css">

    <!--Toaster Css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="http://127.0.0.1:8000/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />



    <style>
        a:hover {
            text-decoration: none !important;
        }

        header {
            background-color: #e3e3e3e6;
            position: relative;
            right: 0;
            left: 0;
            top: 0px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            /*margin-bottom: 20px !important;*/
            z-index: 1;
        }
    </style>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <a class="navbar-brand" href="http://127.0.0.1:8000">
                            <img src="http://127.0.0.1:8000/images/Comp-1.gif" class="img-fluid" alt="">
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class="navbar-nav ml-auto mr-auto">

                                <li class="nav-item ">
                                    <a class="nav-link" href="http://127.0.0.1:8000">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="http://127.0.0.1:8000/about">About</a>
                                </li>
                                <!--<li class="nav-item ">-->
                                <!--    <a class="nav-link" href="http://127.0.0.1:8000/teacher">Teacher</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item ">-->
                                <!--    <a class="nav-link" href="http://127.0.0.1:8000/provider">Provider</a>-->
                                <!--</li>-->
                                <li class="nav-item ">
                                    <a class="nav-link" href="http://127.0.0.1:8000/contact">Contact Us</a>
                                </li>












                                <li class="nav-item ">

                                    <a class="nav-link" href="http://127.0.0.1:8000/signin"> Log In </a>
                                </li>




                            </ul>

                            <form class="form-inline my-2 my-lg-0">



                                <!--<a href="become-a-teacher" class="custom-btn" type="submit" style="color:#fff !important;">   Become A Teacher </a>-->
                                <!--<a href="become-a-provider" class="custom-btn" type="submit" style="color:#fff !important;">  Become A Provider </a> -->


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




    <section class="back">

        <div class="container-fluid">

            <div class="profilebg1"
                style="background-image: url(http://127.0.0.1:8000/images/profilebg.png) !important; background-size: cover !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile1">
                            <img src="http://127.0.0.1:8000/images/profilemain1.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-name-bg">
                <div class="row">

                    <div class="col-md-3">
                        <div class="profile-name">
                            <h5> <span>
                                </span></h5>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="container-fluid">
            <div class="feedDiv" data-toggle="modal" data-target="#feedModal">
                <i class="fas fa-address-book"></i>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-4 feedcol">
                    <div class="sidebarleft">
                        <div class="profilebuttons">
                            <ul>
                                <li><a class="" href="http://127.0.0.1:8000/teacher_dashboard"><img
                                            src="http://127.0.0.1:8000/images/home1.png"> Teacher Dashboard </a></li>
                                <li><a class="" href="http://127.0.0.1:8000/add-post"><img
                                            src="http://127.0.0.1:8000/images/notification1.png"> Sandbox </a></li>
                                <li><a class="" href="http://127.0.0.1:8000/job-board"><img
                                            src="http://127.0.0.1:8000/images/notification1.png"> Bulletin Board </a>
                                </li>
                                <li><a class="" href="http://127.0.0.1:8000/update-profile"><img
                                            src="http://127.0.0.1:8000/images/group511.png">Profile Update</a></li>
                                <li><a class="" href="http://127.0.0.1:8000/my-pinned"><img
                                            src="http://127.0.0.1:8000/images/home1.png"> Saved </a></li>
                                <li><a class="" href="http://127.0.0.1:8000/signout"><img
                                            src="http://127.0.0.1:8000/images/logout1.png">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-8">

                    <div class="tab-content">
                        <div class="profile-disctiption chat_list">
                            <div class="chat_item">
                                <h6>Clark Kent</h6>
                            </div>
                        </div>
                        <div class="chating_section">
                            <div class="messg-info">
                                <div class="right_messg time_show">
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, nobis
                                            eaque?
                                            Aut, voluptatibus dolores reprehenderit et laudantium explicabo labore
                                        </div>
                                    </div>
                                </div>
                                <div class="left_messg time_show">

                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, nobis
                                            eaque?
                                            Aut, voluptatibus dolores reprehenderit et laudantium explicabo labore
                                            soluta
                                            iure delectus mollitia quidem quis animi. Labore deserunt natus hic.
                                        </div>
                                    </div>
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                </div>
                                <div class="right_messg time_show">
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            ok
                                        </div>
                                    </div>
                                </div>
                                <div class="left_messg time_show">

                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem ipsum dolor sit amet consectetur
                                        </div>
                                    </div>
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                </div>

                                <div class="left_messg time_show">

                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            ok
                                        </div>
                                    </div>
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                </div>
                                <div class="right_messg time_show">
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. In voluptates earum
                                            explicabo aperiam animi reprehenderit, cupiditate cumque ea. Architecto
                                            minus fugit perspiciatis ipsum, maxime recusandae, amet quos tempore vero
                                            mollitia dicta magni nisi ad numquam fugiat! Vero, repellat? Est, voluptate
                                            error id iusto nulla voluptatibus autem porro obcaecati officiis enim
                                            incidunt doloribus illum possimus quas non illo atque dignissimos explicabo!
                                        </div>
                                    </div>
                                </div>
                                <div class="left_messg time_show">

                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates dolor
                                            saepe dolorum. Quibusdam aliquid sequi rem molestias, at eaque, laborum
                                            provident, alias ut earum eligendi voluptatem dolore consequatur accusantium
                                            repellendus vitae? Neque laudantium fugit sunt hic, est placeat harum saepe.
                                            Culpa id suscipit adipisci voluptatum. Dolore ipsa delectus totam rem error
                                            eos nobis, aut fugiat at necessitatibus in neque alias cupiditate laboriosam
                                            ut ratione officia quaerat deleniti aperiam obcaecati reprehenderit
                                            similique, vero ipsum eum? Libero repudiandae tenetur animi quod corporis
                                            nihil eaque numquam alias sapiente voluptates repellendus magni, ratione
                                            labore mollitia incidunt nobis eveniet eos excepturi distinctio unde
                                            aliquam. Nam, harum inventore pariatur est consequuntur enim ex molestiae
                                            culpa numquam tempora recusandae repudiandae explicabo, repellendus
                                            cupiditate, aliquid consequatur qui nisi magnam fugiat. Totam voluptatem
                                            possimus nesciunt vero autem quia at! Nesciunt cum ullam deleniti impedit
                                            repellat saepe ex? Nisi veniam exercitationem nulla, illum quae cupiditate
                                            alias iste aliquam at possimus tenetur impedit ducimus similique odit
                                            molestias omnis nihil et? Fugit distinctio numquam rerum? Nesciunt vel
                                            eligendi repellat obcaecati, consequuntur soluta itaque aliquam odio commodi
                                            natus et aut libero maiores aliquid quas beatae delectus dicta enim harum,
                                            quasi nam. Excepturi voluptates dolorem, reprehenderit qui nostrum deserunt!
                                            Harum minima obcaecati accusantium atque?
                                        </div>
                                    </div>
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                </div>

                                <div class="right_messg time_show">
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-type-input">
                                <input type="" id="messg_type" placeholder="" class="form-control">
                                <button type="submit" class="btn btn-send"><img
                                        src="http://127.0.0.1:8000/images/send.png" class="img-fluid"
                                        alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 sidebarleftprofile">

                    <div class="sidebarleft">

                        <div class="most">
                            <h5> All Teachers </h5>
                        </div>

                        <div class="user recent_users">
                            <ul>
                                <li>
                                    <img style="height:39px; width:39px;"
                                        src="http://127.0.0.1:8000/uploads/users/22894134_2065293476817820_977777575837888779_n_1687664766.jpg"
                                        class="img-fluid">

                                    <h6> Angela <img src="http://127.0.0.1:8000/images/dotgreen.png"
                                            class="img-fluid"></h6>
                                </li>
                                <li>
                                    <img style="height:39px; width:39px;"
                                        src="http://127.0.0.1:8000/uploads/users/photo-1633332755192-727a05c4013d_1680901353.jpg"
                                        class="img-fluid">

                                    <h6> Abel <img src="http://127.0.0.1:8000/images/dotgreen.png" class="img-fluid">
                                    </h6>
                                </li>
                                <li>
                                    <img style="height:39px; width:39px;"
                                        src="http://127.0.0.1:8000/uploads/users/sasas_1681845638.PNG"
                                        class="img-fluid">

                                    <h6> Hadley Potter <img src="http://127.0.0.1:8000/images/dotgreen.png"
                                            class="img-fluid"></h6>
                                </li>
                                <li>
                                    <img style="height:39px; width:39px;"
                                        src="http://127.0.0.1:8000/uploads/users/harry_1684179085.jpg"
                                        class="img-fluid">

                                    <h6> Harry <img src="http://127.0.0.1:8000/images/dotgreen.png" class="img-fluid">
                                    </h6>
                                </li>
                                <li>
                                    <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">

                                    <h6> Renee <img src="http://127.0.0.1:8000/images/dotgreen.png" class="img-fluid">
                                    </h6>
                                </li>
                                <li>
                                    <img style="height:39px; width:39px;"
                                        src="http://127.0.0.1:8000/uploads/users/Dad-Aug_2023_1717089601.jpg"
                                        class="img-fluid">

                                    <h6> Susan <img src="http://127.0.0.1:8000/images/dotgreen.png" class="img-fluid">
                                    </h6>
                                </li>
                                <li>
                                    <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">

                                    <h6> Sharon Kelley <img src="http://127.0.0.1:8000/images/dotgreen.png"
                                            class="img-fluid"></h6>
                                </li>
                                <li>
                                    <img style="height:39px; width:39px;"
                                        src="http://127.0.0.1:8000/uploads/users/Piper_2023_(2)_1719281103.jpg"
                                        class="img-fluid">

                                    <h6> Jennifer <img src="http://127.0.0.1:8000/images/dotgreen.png"
                                            class="img-fluid"></h6>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </section>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"
        integrity="sha512-YHQNqPhxuCY2ddskIbDlZfwY6Vx3L3w9WRbyJCY81xpqLmrM6rL2+LocBgeVHwGY9SXYfQWJ+lcEWx1fKS2s8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- <script src="js/script.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>

    <script src="http://127.0.0.1:8000/js/custom.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script>
        // Set the options that I want
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>







    <script>
        AOS.init({
            duration: 2000,
        });
    </script>



    <script src="http://127.0.0.1:8000/plugins/vendors/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(function() {
            $('.dropify').dropify();
        });
    </script>

    <!-- DataTables -->
    <script src="http://127.0.0.1:8000/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://127.0.0.1:8000/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="http://127.0.0.1:8000/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="http://127.0.0.1:8000/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <!-- Sandbox terms modal -->
    <div class="modal fade" id="modal_agree_to_sandbox_terms" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sandbox terms</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h6>Community Guidelines</h6>
                        </div>
                        <div class="col-12">
                            <p>
                                Welcome to the Sandbox!
                            </p>
                            <p>
                                The Sandbox is meant to be a place to interact with other professionals while at work;
                                learn from others, build relationships, and otherwise just ‘hang out’. This is the
                                spirit in which these guidelines have been established. The discussions and the way all
                                members and Preschool Portal employees are treated are always to be professional. The
                                general rule of thumb to follow is that if the talk is inappropriate for a traditional
                                workplace, then it is not appropriate here. Forums like the Sandbox are at their best
                                when participants treat each other with respect and courtesy. Please be mindful of this
                                when participating here in the Sandbox.
                            </p>
                            <p>
                                Preschool Portal will occasionally move discussions if they belong in a different
                                category. We will also close/remove duplicate discussions and/or replies if they are
                                causing confusion, are mean-spirited, or are otherwise inappropriate (see our
                                Do’s/Don’ts below). Our intention is not to censor, but to foster an environment that is
                                easy to use and productive for all those involved.
                            </p>
                        </div>
                        <div class="col-12 text-center">
                            <a target="_blank" href="http://127.0.0.1:8000/rules-of-conduct-individual">Rules of
                                conduct</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <a href="http://127.0.0.1:8000/agree-to-sanbox-terms" type="button" class="btn btn-primary">I
                        agree to
                        the terms</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {

            if (parseInt('') == 0) {
                $('#modal_agree_to_sandbox_terms').modal({
                    keyboard: false
                });
                $('#modal_agree_to_sandbox_terms').modal('show');
            }
        });
    </script>


</body>

</html>


<script>
    $("#save_post").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);


        $.ajax({
            url: "http://127.0.0.1:8000/new-post",
            type: 'POST',
            data: formData,
            success: function(response) {

                // toastr.success(response.message);

                // $('.comment_div').empty();

                if (response.status) {
                    $('#prog').show();

                    setTimeout(function() {
                        // alert("sd");

                        $('#prog').hide();
                        toastr.success(response.message);

                        get_last_post();

                    }, 2000);

                }

            },
            cache: false,
            contentType: false,
            processData: false
        });
    });


    function get_last_post() {

        $.ajax({
            url: "http://127.0.0.1:8000/get_last_post",
            type: 'GET',
            success: function(response) {

                // toastr.success(response.message);
                $('.comment_div').empty();

                if (response.status) {

                    // toastr.success(response.message);
                    console.log(response.get_last_post);

                    var data = response.get_last_post;
                    var post_user_image = response.p_u_profile;
                    var dayago = response.dayago;

                    let post_image_string = data.image ? `<div class="newfeed-image">

                            <img style="height:400px; width:100%; border-radius:10px;" src="http://127.0.0.1:8000/${data.image}" class="img-fluid">

                        </div>` : ``;


                    $('.comment_div').append(
                        `<div class="newfeed">

                        <input type="hidden" name="" id="get_id" value="${data.id}">

                        <div class="newfeed-profile-name">

                            <img style="height:60px; width:60px; border-radius:50px" src="${post_user_image}" class="img-fluid">

                            <h4> ${data.user_name} <span> ${dayago} </span></h4>

                            <button class="btn btn-danger" style="position:absolute; right:50px;" onClick="delete_post(${data.id})"> <span class="fa fa-trash" > </span> </button>

                        </div>

                        <div class="newfeed-image">

                            <p> ${data.post} </p>

                        </div>

                        ` + post_image_string + `


                        <hr>


                        </div>`
                    );

                }

            },
            cache: false,
            contentType: false,
            processData: false
        });

    }


    // setInterval(function(){
    //     // alert("sd");
    //     $(".comment_div").load(location.href+" .comment_div>*","");

    // }, 5000);


    // $('#btn_post').click(function(){

    //     $('#prog').show();
    //     setTimeout(function(){

    //         $('#prog').hide();
    //         // $(".comment_div").load(location.href+" .comment_div>*","");


    //     }, 3000);

    // });


    function delete_post(postid) {

        // alert(postid);

        var post_id = postid;

        $('#prog').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "http://127.0.0.1:8000/delete-post",
            type: 'POST',
            data: {
                "_token": "2WOdTjzfq08jf7LJZ8grAtofpuhmTe9kzpNVoIya",
                post_id: post_id
            },
            success: function(response) {

                if (response.status) {


                    setTimeout(function() {
                        // alert("sd");

                        $('#prog').hide();
                        toastr.success(response.message);

                        get_last_post();

                    }, 2000);


                }

            }
        });

    }


    function add_pined_post(postid) {

        // alert(postid);

        var pined_post_id = postid;

        $('#prog').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "http://127.0.0.1:8000/add-pined-post",
            type: 'POST',
            data: {
                "_token": "2WOdTjzfq08jf7LJZ8grAtofpuhmTe9kzpNVoIya",
                pined_post_id: pined_post_id

            },
            success: function(response) {

                if (response.status) {


                    setTimeout(function() {
                        // alert("sd");

                        $('#prog').hide();
                        toastr.success(response.message);

                        get_last_post();

                    }, 2000);


                }

            }
        });

    }


    get_last_post();


    function adjustTextareaSize() {
        const textarea = document.getElementById('dynamicTextarea');
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight) + 'px';
        textarea.style.width = 'auto';
        textarea.style.width = (textarea.scrollWidth + 10) + 'px';
    }
</script>
