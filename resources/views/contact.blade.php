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

#embed-map-display .text-marker{}.map-generator{
    max-width: 100%; 
    max-height: 100%; 
    background: none;
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
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">

                {!! $page->content !!}

                </div>
            </div>
        </div>
    </div>
</section>


<section class="zig-zag Teacher-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-12 p-0">
                <div class="images-zag" data-aos="flip-left" data-aos-easing="linear" data-aos-duration="1500">
                    <div style="overflow:hidden;resize:none;max-width:100%;width:500px;height:500px;">
                   
                    <div id="embed-map-display" style="height:100%; width:100%;max-width:100%;">
                        <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=1720+South+Blagg+Road,+Pahrump,+NV+89048,+USA&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="embedded-map-code" rel="nofollow" href="https://www.bootstrapskins.com/themes" id="authorize-maps-data">premium bootstrap themes</a>
                    </div>
                
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-12">
                <div class="content-zig mt-0 pt-0 priority" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                
                    <form class="form_submission" id="contactform" method="post">
                        
                        @csrf 
                        <div class="row">
                          
                            <input type="hidden" name="form_name" value="Contact Form">

                            <div class="col-lg-12" style="margin-top: 20px">
                                <input type="text" class="form-control" name="fname" placeholder="First name" required="">
                            </div>
                            
                           <br><br>
  
                           <div class="col-lg-12" style="margin-top: 20px">
                                <input type="text" class="form-control" name="lname" placeholder="First name" required="">
                            </div>
                            
                           <br><br>

                           <div class="col-lg-12" style="margin-top: 20px">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            
                           <br><br>

                           <div class="col-lg-12" style="margin-top: 20px">
                                <input type="text" class="form-control" name="phone" placeholder="Phone No" required="">
                            </div>
                            
                           <br><br>
                            
                          
                             
                        </div>
                        <div class="form-group" style="margin-top: 20px">
                            <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="6" placeholder="Tell us about yoursel?"></textarea>
                        </div>

                        <button type="submit" class="custom-btn"> Submit </button>

                    </form>


                </div>
                <div id="contactformsresult">  </div>
            
            </div>

        </div>
    </div>
</section>

<!-- ============================================================== -->


@endsection


@section('js')
<script type="text/javascript"></script>
@endsection