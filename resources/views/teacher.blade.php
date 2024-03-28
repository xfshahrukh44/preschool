@extends('layouts.main')

@section('css')
<style>

.about-sec-one {
    background-image: url('{{asset($page->image)}}');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}

</style>
@endsection



@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->


<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us"  data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                
                    {!! $page->content !!}

                </div>
            </div>
        </div>
    </div>
</section>


<section class="zig-zag Teacher-sec">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            
        @if($get_teacher != "")   

            @foreach($get_teacher as $key => $val_teacher)
            
                @if($key % 2 == '0')
                    
                    <div class="col-lg-6  col-md-6 col-12 p-0">
                        <div class="images-zag" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                            <figure>
                                @if($val_teacher->image != '')
                                <img src="{{asset($val_teacher->image)}}" class="img-fluid" style="width: 500px;height: 400px;" alt="">
                                @else
                                <img src="{{asset('images/empty.jpg')}}" class="img-fluid" style="width: 500px;height: 400px;" alt="">
                                @endif
                            </figure>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="content-zig mt-0 pt-0"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                            <h6>
                               {{$val_teacher->name}} {{$val_teacher->lname}}
                            </h6>
                            
                            <p> {!! str_limit($val_teacher->about, $limit = 400, $end = '...') !!} </p>
                            <br>

                            <!-- <a href="tel:{{$val_teacher->phone}}" class="custom-btn mt-5">Contact Us</a> -->
                        </div>
                    </div>

                @else
                
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="content-zig mt-0 pt-0"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                            <h6>
                                {{$val_teacher->name}} {{$val_teacher->lname}}
                            </h6>
                            <p> {!! str_limit($val_teacher->about, $limit = 400, $end = '...') !!} </p>
                            <br>
                            <!-- <a href="tel:{{$val_teacher->phone}}" class="custom-btn mt-5">Contact Us</a> -->
                        </div>
                    </div>

                    <div class="col-lg-6  col-md-6 col-12 p-0">
                        <div class="images-zag" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                        <!-- empty.jpg -->
                            <figure>
                                @if($val_teacher->image != '')
                                <img src="{{asset($val_teacher->image)}}" class="img-fluid" style="width: 500px;height: 400px;" alt="">
                                @else
                                <img src="{{asset('images/empty.jpg')}}" class="img-fluid" style="width: 500px;height: 400px;" alt="">
                                @endif
                            </figure>
                        </div>
                    </div>

                @endif
                
            
            @endforeach

        @else
       
        <div>
            <hr>
            <h4> ====== No Record Found ====== </h4>
            <hr>
        </div>
        
        @endif

        </div>
    </div>
</section>



<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection