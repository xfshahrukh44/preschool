@extends('layouts.main')

@section('css')
<style>

    .mediabox {
        height: 150px;
        width: 150px;
        border-radius: 100%;
    }

    .mediabox img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 100%;
    }

    .author-img {
        height: 50px;
        width: 50px;
        border-radius: 100%;
    }

    .author-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 100%;
    }



    /* .media {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: center;
    } */

    .media-body {
        padding: 0px 10px;
    }
    h2 {
    color: white;
    font-family: "Inter", sans-serif;
    font-weight: bold;
    font-size: 65px;
    line-height: 80px;
}

.about-sec-one {
    background-image: url(https://testdemowebsite-v1.com/custom-backend/preschool_portal/public/uploads/pages/9_1680634269.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}

.about-us {
    text-align: center;
}

.shared-gallery-card {
    border: 1px solid #e1e1e1;
    position: relative;
    z-index: 0;
    margin: 2rem 0;
}

.shared-gallery-footer {
    position: absolute;
    bottom: 20px;
    left: 30px;
    right: 0;
    display: flex;
    gap: 30px;
}

.shared-gallery-footer span i {
    color: white;
}

.shared-gallery-header {
    padding: 14px 14px 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}


.gallery-sec {
    padding: 6rem 6rem;
}

.shared-gallery-card button {
    border: 0;
    background: transparent;
    cursor: pointer;
    color: rgb(151, 151, 151);
}

.profile-photo {
    color: rgb(151, 151, 151);
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background-color: rgb(216, 216, 216);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 25px;
}

.shared-gallery-header div:nth-child(01) {
    display: flex;
    align-items: center;
    gap: 20px;
}

span.preschool-title {
    font-weight: 500;
}

button:focus {
    outline: 1px dotted;
    outline: 0px auto -webkit-focus-ring-color;
}
.shared-gallery-figure img {
    height: 100%;
    object-fit: cover;
    width: 100%;
}

.shared-gallery-figure {
    height: 300px;
}

span.heart-icon a {
    color: white;
    text-decoration: none;
}


/* gallery detail css  */
.gallery-detail{
    padding-top: 10px;
    padding-bottom: 50px;
}
.gallery-image img {
    width: 100%;
}

.portal {
    display: flex;
    gap: 12px;
}

.profile h2 {
    border-radius: 50%;
    background-color: #d8d8d8;
    /* padding: 10px 20px; */
    width: 60px;
    height: 60px;
    font-size: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-detail h6 {
    font-size: 18px;
    font-weight: 500;
}

.profile-detail h6 span {
    display: block;
    font-size: 12px;
    margin-top: 2px;
    font-weight: 500;
}
.profile-detail {
    margin-top: 8px;
}

h5.flying {
    font-weight: 500;
    font-size: 18px;
    margin: 18px 0 2px;
}

.heart {
    margin-bottom: 20px;
    display: flex;
    gap: 10px;
    border: 1px solid grey;
    width: 60px;
    padding: 5px 7px 0px 9px;
    border-radius: 5px;
    margin-top: 20px;
    display: inline-flex;
}

.heart h3 {
    font-weight: 500;
    font-size: 17px;
    color: gray;
}
.heart i {
    margin-top: 3px;
    font-size: 20px;
    color: gray;
}
h5.flying.new {
    color: #a35f50;
    font-size: 16px;
    margin-top: 10px;
    margin-bottom: 30px;
}

.gallery-info form text-area {
    width: 100%;
    border: none;
    border: 1px solid #aba8a8;
    margin: 0;
    margin-top: 1rem;
    padding: 10px 14px;
    height: 90px;
    margin-bottom: 1rem;
}

.thoughts {
    text-align: center;
    margin-top: 30px;
    border-bottom: 2px solid gray;
    border-top: 2px solid gray;
    padding: 30px 0px;
}

.thoughts h4 {
    font-size: 20px;
    color: gray;
    font-weight: 400;
}

.thoughts h4 span {
    display: block;
    font-size: 16px;
    margin-top: 8px;
    margin-bottom: 2rem;
    margin-top: 1rem;
}

.thoughts a {
    padding: 10px 25px;
    color: white;
    background-color: #a35f50;
    font-weight: 400;
    text-decoration: none;
}

.thoughts a.btn-custom {
    background: none;
    color: #a35f50;
    margin-left: 1rem;
}
.drop-down-parent- {
    display: flex;
    align-items: self-start;
    justify-content: space-between;
    width: 100%;
}

.drop-down-parent button {
    background: transparent;
    border: 0;
    cursor: pointer;
}

.gallery-info form input::placeholder {
    font-size: 17px;
    color: grey;
    font-weight: 400;
}

.gallery-info {
    width: 90%;
    margin: auto;
}

h5.flying.tag-member {
    color: #a35f50;
}
.btn-custom.brown {
    padding: 10px 25px;
    color: white;
    background-color: #a35f50;
    font-weight: 400;
    text-decoration: none;
    display: block;
}
.tag-member-area text-area {
    width: 100%;
}

.tag-member-area textarea {
    width: 100%;
    height: 100px;
    padding: 10px 14px;
    margin: 12px 0 1rem;
}
/* gallery detail css  */

/* comments css  */
.author-bio {
    padding: 30px;
    margin-top: 30px;
    margin-bottom: 40px;
    border: 1px solid #ececec;
    color: #666666;
  }
  .author-bio .author-bio-title {
    color: #cd2129;
    font-weight: 400;
    margin-bottom: 10px;
  }
  .author-bio span {
    color: #666666;
  }
  .comment-content {
    background: #f7f7f7;
    padding: 25px 30px;
    position: relative;
  }
  .comment-content .comment-author-name {
    color: #cd2129;
    font-size: 14px;
    font-weight: 400;
    transition: 0.5s;
  }
  .comment-content .comment-date {
    color: #666666;
    font-size: 12px;
    display: inline-block;
    margin-left: 5px;
    margin-bottom: 10px;
  }
  .comment-content .single-page-comment-content {
    color: #666666;
    font-size: 14px;
  }
  .comment-content .comment-angle-img {
    position: absolute;
    bottom: 29px;
    left: -28px;
    z-index: 1;
  }
  .comment-content a:hover .comment-author-name {
    color: #ff9800;
  }
  .main-comment {
    margin-bottom: 20px;
  }
  .main-comment .author-img {
    transform: translateY(31px);
  }
  .single-comment-reply {
    position: absolute;
    right: 30px;
    font-size: 14px;
  }
  .single-comment-reply a {
    display: inline-block;
    color: #666666;
  }
  .single-comment-reply i {
    margin-left: 5px;
  }
  .single-comment-from .form-control {
    background: #f6f6f6;
    border-radius: 0;
    border-color: #f6f6f6;
    padding: 13px;
    font-size: 14px;
    color: #666666;
  }
  .single-comment-from .form-control:focus {
    border-color: #ff9800;
  }
  .single-comment-from .comment-textarea {
    margin-bottom: 40px;
    height: 150px;
  }
  .single-comment-from label {
    color: #666666;
    font-size: 14px;
  }
  .single-comment-from .reply-area {
    margin-top: 25px;
    margin-bottom: 30px;
  }
  .single-comment-from .reply-area .reply-title {
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 20px;
  }
  .comment-submit-btn {
    padding: 14px 60px;
    font-size: 16px;
    font-weight: 400;
    background: #333333;
    color: #fff;
    cursor: pointer;
    border-radius: 0;
    transition: 0.5s;
  }
  .comment-submit-btn:hover {
    background: #ff9800;
  }

  .add-section {
    margin-top: 30px;
  }
  .add-section a {
    display: inline-block;
    margin-bottom: 20px;
  }

.cumtum-bread-crums {
    margin-top: 3rem;
}

.cumtum-bread-crums .breadcrumb {
    background: transparent;
}

.cumtum-bread-crums .breadcrumb a {
    font-weight: 600;
    color: black;
}
/* comments css  */

.shared-gallery-header .dropdown-menu {
    padding: 0;
}

@media (max-width: 1440px) {

.shared-gallery-figure {
    height: 200px;
}

.gallery-sec {
    padding: 1rem 1rem;
}

}
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="cumtum-bread-crums">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>
</div>

        </div>
    </div>
</div>
<section class="gallery-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="gallery-image">
                    <img src="{{ asset($galleryDetail->image) }}" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="gallery-info">
                    <div class="row">
                        <div class="drop-down-parent-">
                            <div class="date-name-child">
                                <div class="portal">
                                    <div class="profile">
                                        <h2>P</h2>
                                    </div>
                                    <div class="profile-detail">
                                        <h6>{{ $galleryDetail->user->name }}<span>{{ Carbon\Carbon::parse($galleryDetail->created_at)->format('M d,Y') }}</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="drop-down-parent">
                                <div class="dropdown">
                                    <button class="" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button">Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="flying tag-member">{{ $galleryDetail->name }}</h5>
                    <div class="heart">
                        <i class="fa-regular fa-heart"></i>
                        <h3>0</h3>
                    </div>
                    {{-- <h5 class="flying">Tag Members</h5>
                    <form>
                        <div class="tag-member-area">
                            <textarea name="" id="" width="100%" height="100%" placeholder="Comments"></textarea>
                            <button type="submit" class="btn btn-custom brown">Submit</button>
                        </div>
                    </form> --}}
                    @if(!Auth::check())
                    <div class="thoughts">
                        <h4>Share Your Thoughts<span>Sign up to leave a comment.</span></h4>
                        <a href="{{ route('signin') }}">Log In</a>
                        <a href="{{ route('joinnow') }}" class="btn btn-custom">Sign Up</a>
                    </div>
                    @endif
                    <div class="hr"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="author-bio">
                    <div class="media">
                        {{-- @dump($galleryDetail->user->profile->pic) --}}
                        <div class="mediabox">
                            @if(empty($galleryDetail->user->profile->pic))
                            <img class="d-flex mr-3" src="{{asset('images/noimage.png')}}" alt="author-img">
                            @else

                            <img class="d-flex mr-3" src="{{asset('storage/uploads/users/'.$galleryDetail->user->profile->pic)}}"
                            alt="author-img">
                            @endif
                        </div>

                        <div class="media-body">
                            <h5 class="mt-0 author-bio-title">{{ $galleryDetail->user->name }}</span></h5>
                            It is a long established fact that a reader looking at its layout. The point of using Lorem Ipsum is that it has.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        @foreach($comment as $value)

                        <div class="media main-comment">
                            <div class="author-img">
                                @if(empty($value->user->profile->pic))
                                <img class="d-flex mr-3" src="{{asset('images/noimage.png')}}" alt="author-img">

                                @else
                                <img class="d-flex mr-3" src="{{asset('storage/uploads/users/'.$value->user->profile->pic)}}" alt="author-img">
                                @endif

                            </div>
                            <div class="media-body">
                                <div class="comment-content">
                                    <div class="single-comment-reply">
                                        <a href="#" data-toggle="modal" data-target="#myModal-{{ $value->id }}">Reply</a>
                                        <i class="fa fa-share" aria-hidden="true"></i>
                                    </div>
                                    {{-- <img class="d-flex mr-3 author-comment-img" src="images/author-img-2.png" alt="author-img"> --}}
                                    <a href="#" >
                                        <h5 class="mt-0 comment-author-name">{{ $value->user->name }} <span class="comment-date">{{ Carbon\Carbon::parse($galleryDetail->created_at)->format('M d,Y') }}</span></h5>
                                    </a>
                                    <p class="single-page-comment-content">{{ $value->comment }}</p>
                                    <div class="comment-angle-img">
                                        <img src="{{ asset('images/comment-angle.png') }}" alt="author-img">
                                    </div>
                                </div>
                                <!-- The Modal -->
                                    <div class="modal" id="myModal-{{ $value->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h6 class="modal-title">Reply to {{ $value->user->name }}</h6>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="{{ route('replySubmit') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="post_id" value="{{ $galleryDetail->id }}">
                                                    <input type="hidden" name="reply_id" value="{{ $value->id }}">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputEmailwdfn">Name *</label>
                                                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" id="exampleInputEmailwdfn" placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="exampleInputPasswordwdfe">Email *</label>
                                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="exampleInputPasswordwdfe" placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="exampleInputPasswordwdfp">Your Comments *</label>
                                                            <textarea class="form-control comment-textarea" name="comment" id="exampleInputPasswordwdfp" required></textarea>
                                                        </div>
                                                    </div>
                                                    @if(Auth::check())
                                                    <button type="submit" class="btn btn-default comment-submit-btn">Comments</button>
                                                    @else
                                                    <a href="{{ route('signin') }}" class="btn btn-default comment-submit-btn">Login for Reply</a>
                                                    @endif
                                                </form>
                                            </div>

                                            <!-- Modal footer -->
                                            {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div> --}}

                                        </div>
                                        </div>
                                    </div>
                                @php
                                    $reply = App\Models\Comment::where('reply_id', $value->id)->get();
                                @endphp
                                @foreach ($reply as $rep)
                                <div class="media mt-3">
                                    <a class="d-flex pr-3" href="#">
                                        <div class="author-img">
                                            @if(empty($rep->user->profile->pic))
                                            <img class="d-flex mr-3" src="{{asset('images/noimage.png')}}" alt="author-img">

                                            @else
                                            <img class="d-flex mr-3" src="{{asset('storage/uploads/users/'.$rep->user->profile->pic)}}" alt="author-img">
                                            @endif
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <div class="comment-content">

                                                <h5 class="mt-0 comment-author-name">{{ $rep->user->name }} <span class="comment-date">{{ Carbon\Carbon::parse($rep->created_at)->format('M d,Y') }}</span></h5>
                                            </a>
                                            <p class="single-page-comment-content">{{ $rep->comment }}</p>
                                            <div class="comment-angle-img">
                                                <img src="{{ asset('images/comment-angle.png') }}" alt="author-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        @endforeach



                        <!--
												=======================
												Comment from
												=======================
											 -->
                        <div class="single-comment-from">
                            <div class="reply-area">
                                <h4 class="reply-title">Leave Your Reply</h4>
                                <p class="reply-content">Your email address will not be published. Required fields are marked *</p>
                            </div>
                            <form action="{{ route('commentSubmit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="post_id" value="{{ $galleryDetail->id }}">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmailwdfn">Name *</label>
                                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" id="exampleInputEmailwdfn" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPasswordwdfe">Email *</label>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="exampleInputPasswordwdfe" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputPasswordwdfp">Your Comments *</label>
                                        <textarea class="form-control comment-textarea" name="comment" id="exampleInputPasswordwdfp" required></textarea>
                                    </div>
                                </div>
                                @if(Auth::check())
                                <button type="submit" class="btn btn-default comment-submit-btn">Comments</button>
                                @else
                                <a href="{{ route('signin') }}" class="btn btn-default comment-submit-btn">Login for Comment</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->









<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection
