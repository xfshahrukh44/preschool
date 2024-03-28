@extends('layouts.main')
@section('css')
<style>
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
@endsection

@section('content')
    <section class="about-sec-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="about-us">
                        <h2>{{ $page->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery-sec py">
        <div class="container-fluid">
            <div class="row">
                @foreach ($gallery as $item)
                    <div class="col-lg-3">
                        <div class="shared-gallery-card">
                            <div class="shared-gallery-header">
                                <div class="">
                                    <span class="profile-photo"> P </span>
                                    <span class="preschool-title">
                                        Preschool Portal
                                    </span>
                                </div>
                                <span class="dropdown">
                                    <div class="dropdown">
                                        <button class="" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Download</button>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="shared-gallery-figure">
                                <a href="{{ route('gallery-detail', ['id' => $item->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $item->name)))]) }}"> <img src="{{ asset($item->image) }}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="shared-gallery-footer">
                                <span class="heart-icon">
                                    <a href="{{ route('gallery-detail', ['id' => $item->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $item->name)))]) }}"><i class="fa-regular fa-heart"></i>
                                        0
                                    </a>
                                </span>
                                <span class="heart-icon">
                                    <a href="{{ route('gallery-detail', ['id' => $item->id, 'name' => preg_replace('/[^A-Za-z0-9\-]/', '', strtolower(str_replace(' ', '-', $item->name)))]) }}"><i class="fa-regular fa-comment"></i>
                                        0
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection


@section('js')
    <script type="text/javascript"></script>
@endsection
