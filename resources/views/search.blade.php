@extends('layouts.main')

@section('css')
    <style>
        .about-sec-one {
            background-image: url('{{ asset($page->image) }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 450px;
            display: flex;
            align-items: center;
        }

        .top-bottom {
            background-image: url('{{ asset($section[0]->value) }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 820px;
            box-shadow: 0px 0px 14px 2px #0000002b;
            border-radius: 20px;
        }

        .top-bottom.two {
            background-image: url('{{ asset($section[2]->value) }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 720px;
            margin-top: 100px;
        }


        .about-sec-three {
            background-image: url('{{ asset($section[4]->value) }}');
            background-position: left;
            background-size: 50%;
            background-color: #000000;
            background-repeat: no-repeat;
            height: 600px;
            display: flex;
            align-items: center;
        }

        a.btn.btn-secondary {
            background: #8cc63f;
            border: 0px #8cc63f;
        }

        .clien_details {
            display: flex;
            align-items: end;
            justify-content: space-between;
            margin-bottom: 20px
        }

        .profile_img {
            display: flex;
            align-items: start;
            gap: 20px;
        }

        .profile_img figure img {
            width: 110px !important;
            height: 120px !important;
        }

        .client_info h4 {
            font-weight: bold;
            color: black;
            font-size: 30px;
            margin-bottom: 0;
        }

        .client_info p {
            color: black;
            font-weight: 500;
            font-size: 15px;
            margin-bottom: 0;
        }

        .profile_img figure {
            margin: 0;
        }

        .rating_client {
            text-align: end;
        }

        .rating_client span {
            font-size: 30px;
            color: black;
            font-weight: bold;
        }

        .client_star i {
            font-size: 16px;
            color: #ffe234;
        }

        .comment_box {
            display: flex;
            align-items: start;
            gap: 30px;
            margin-top: 40px;
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
        }

        .comment_box .rating_client {
            width: 12%;
            text-align: start;
        }

        .dashboard_details p {
            color: black;
            font-weight: 500;
            font-size: 16px;
        }

        .search_bar_location {
            display: flex;
            align-items: center;
            position: relative;
            z-index: 0;
        }

        .search_bar_location .btn-block {
            width: 70px;
            position: absolute;
            z-index: 0;
            right: 0px;
        }

        .search_bar_location input {
            height: 45px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .dashboard_details {
            margin-bottom: 50px;
        }
    </style>
@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- BODY START HERE -->


    <section class="about-sec-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">

                        {{--                    <h2>Daycare Center</h2> --}}
                        <h2>Childcare Provider Search</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-sec-two">
        <div class="container">

            <div class="row">
                <div class="col-md-3" style="margin-top:50px;">

                    <?php $get_daycarecount = DB::table('childcares')->distinct('name')->count(); ?>

                    {{--                <center> --}}
                    {{--                    <h4 Style="color:#000;"> Childcare Provider Search </h4> --}}
                    {{--                </center> --}}

                    <form method="get" action="{{ route('search') }}" class="search_bar_location">
                        <input class="form-control" name="search" type="text" placeholder="Search providers"
                            value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-block"><i class="fas fa-search"></i></button>
                    </form>

                    <hr>

                </div>
            </div>

            <div class="row">
                {{-- @dd($search_result); --}}
                @foreach ($search_result as $key => $val_search)
                    <div class="col-lg-12">
                        <div class="dashboard_details">
                            <div class="clien_details">
                                <div class="profile_img">
                                    <figure>
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzCW8ayM9K_iNzX81NSjgpGcl30jDvsTSiIg&s"
                                            style="height: 329px;width: 100%;" alt="" class="img-fluid">
                                    </figure>
                                    <div class="client_info">
                                        <h4>{{ $val_search->name ? $val_search->name : 'N\A' }}</h4>
                                        <p>
                                            @if (!empty($val_search->city) && !empty($val_search->state))
                                                {{ $val_search->city . ',' . $val_search->state }},
                                            @else
                                                {{ $val_search->city . ' ' . ($val_search->state = 'N\A') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="rating_client">
                                    <span>5</span>
                                    <div class="client_star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="current_info">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae aperiam labore quo
                                    itaque
                                    eius! ....<a href="{{ URL('claimed_center_detail/' . $val_search->id) }}">show more</a>
                                </p>
                            </div>
                            <div class="comment_box">
                                <div class="rating_client">
                                    <span>5</span>
                                    <div class="client_star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                                <div class="client_discription">
                                    <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quo ea nam
                                        itaque
                                        consectetur ad porro! <b>Lorem ....</b> <a
                                            href="{{ URL('claimed_center_detail/' . $val_search->id) }}">show more</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $search_result->appends(request()->input())->links() }}
            </div>

            <div class="row">

                <div class="col-md-12" style="margin-top:50px;">

                    <table id="" style="width:100%;"
                        class="table table-hover table-bordered table-striped text-center">

                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>County</th>
                                <th>City</th>
                                <th>Program Type</th>
                                <th>State</th>
                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $search = request()->has('search') ? '?search=' . request()->get('search') : '';
                            @endphp
                            @foreach ($search_result as $key => $val_search)
                                <tr>
                                    <td>
                                        @if ($val_search->claim_status == '1')
                                            {{--                        <a class="btn btn-primary" href="{{ route('signin') }}">Claim</a> --}}
                                            @if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 4)
                                                <a class="btn btn-primary"
                                                    href="{{ route('provider.findDaycare') . $search }}">Claim</a>
                                            @else
                                                {{--                            <a class="btn btn-primary" href="{{ route('provider.findDaycare') }}">Claim</a> --}}
                                                <button data-toggle="modal" data-target="#providerAlert"
                                                    class="btn btn-primary">Claim</button>
                                            @endif
                                        @else
                                            <a class="btn btn-secondary"
                                                href="{{ URL('claimed_center_detail/' . $val_search->id) }}">View</a>
                                        @endif
                                    </td>
                                    <td>{{ $val_search->name ? $val_search->name : 'N\A' }}</td>
                                    <td>{{ $val_search->county ? $val_search->county : 'N\A' }}</td>
                                    <td>{{ $val_search->city ? $val_search->city : 'N\A' }}</td>
                                    <td>{{ $val_search->program_type ? $val_search->program_type : 'N\A' }}</td>
                                    <td>{{ $val_search->state ? $val_search->state : 'N\A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    {{ $search_result->appends(request()->input())->links() }}

                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================== -->
@endsection


@section('js')
    <script type="text/javascript"></script>
@endsection
