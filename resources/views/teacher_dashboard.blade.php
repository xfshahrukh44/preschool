<?php 
use App\User; 
use Carbon\Carbon;
use DateTime;
?>
<!doctype html>
<html lang="en">

@include('headerlink')
<meta name="csrf-token" content="{{ csrf_token() }}">

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

</style>

<body>


<section class="back">

    <div class="container-fluid">
    
    <div class="profilebg1" style="<?php if(Auth::user()->banner_image != ''){ echo "background-image: url('".asset(Auth::user()->banner_image)."') !important;"; }else{ echo 'background-image: url('.asset("images/profilebg.png").') !important;';} ?> background-size: cover !important;">
            <div class="row">
                <div class="col-md-12">
                <div class="profile1">
                        @if(Auth::user()->image != '')
                        <img src="{{asset(Auth::user()->image)}}" style="height:175px; width:175px;" class="img-fluid">
                        @else
                        <img src="{{asset('images/profilemain1.png')}}" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="profile-name-bg">
            <div class="row">
                
                <div class="col-md-3">
                    <div class="profile-name">
                        <h5> {{Auth::user()->name}} {{Auth::user()->lname}} <span> {{Auth::user()->email}} </span></h5>
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
            
            @include('teacher_menues')

            <div class="col-lg-6 col-md-8">


                <form action="{{route('teacher_create_new_post')}}" id="save_post" method="post" enctype="multipart/form-data">
                    
                    @csrf
                    <div class="profileparent" style="">

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="">
                        <input type="hidden" name="user_name" value="{{Auth::user()->name}} {{Auth::user()->lname}}" id="">
                        <input type="hidden" name="user_image" value="{{Auth::user()->image}}" id="">

                        <div>
                            <input type="file" name="image" id="" class="form-control dropify">
                        </div>

                        <div class="profilein1">
                        
                            <div class="newfeed-commnet">
                                <div class="com-img">
                                    @if(Auth::user()->image != '')
                                        <img style="height:60px; width:60px; border-radius: 50px;"
                                        src="{{asset(Auth::user()->image)}}"
                                        class="img-fluid">
                                    @else
                                        <img style="height:60px; width:60px; border-radius:50px;" src="{{asset('images/profilemain1.png')}}" class="img-fluid">
                                    @endif

                                </div>
                                <div class="commentbox">
                                    <h4><input type="text" name="post" placeholder="Write Comment" style="height: 40px; !important; font-size: 15px;"></h4>

                                </div>
                            </div>

                        </div>

                        
                        
                        <div class="write-jus">

                            <!-- <div class="photoup">
                                <ul>
                                    <li><a href=""><img src="{{asset('images/proficon1.png')}}" class="img-fluid"></a></li>
                                    <li><a href=""><img src="{{asset('images/proficon2.png')}}" class="img-fluid"></a></li>
                                    <li><a href=""><img src="{{asset('images/proficon3.png')}}" class="img-fluid"></a></li>
                                    <li><a href=""><img src="{{asset('images/proficon4.png')}}" class="img-fluid"></a></li>
                                </ul>
                            </div> -->

                            <div class="post">
                                <button id="btn_post" type="submit" class="btn  custom-btn">Post</button>
                            </div>
                        </div>

                        
                        <div class="newfeed_progress" id="prog" style="display:none;">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped fill-2" role="progressbar"
                                    style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </form>

                               
                <div class="comment_div">


                    

                </div>
            

            </div>


            <div class="col-md-3 sidebarleftprofile">

                @include('all_teacher')

            </div>

             
        </div>
    </div>

</section>


@include('footerlink')


</body>

</html>


<script>


    $("#save_post").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);

        
        $.ajax({
            url: "{{route('teacher_create_new_post')}}",
            type: 'POST',
            data: formData,
            success: function(response) {

                // toastr.success(response.message);

                // $('.comment_div').empty();

                if(response.status)
                {
                    $('#prog').show();
                  
                    setTimeout(function(){
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

    
    function get_last_post(){

        $.ajax({
            url: "{{route('get_last_post')}}",
            type: 'GET',
            success: function(response) {

                // toastr.success(response.message);
                $('.comment_div').empty();

                if(response.status)
                {

                    // toastr.success(response.message);
                    console.log(response.get_last_post);

                    var data = response.get_last_post;
                    var post_user_image = response.p_u_profile;
                    var dayago = response.dayago;
                 
                    
                 
                    $('.comment_div').append(

                        `<div class="newfeed">

                        <input type="hidden" name="" id="get_id" value="{{'${data.id}'}}">

                        <div class="newfeed-profile-name">

                            <img style="height:60px; width:60px; border-radius:50px" src="${post_user_image}" class="img-fluid">

                            <h4> {{'${data.user_name}'}} <span> {{'${dayago}'}} </span></h4>

                            <button class="btn btn-danger" style="position:absolute; right:50px;" onClick="delete_post({{'${data.id}'}})"> <span class="fa fa-trash" > </span> </button>
                            
                        </div>

                        <div class="newfeed-image">

                            <p> {{'${data.post}'}} </p>

                        </div>

                        <div class="newfeed-image">

                            <img style="height:400px; width:100%; border-radius:10px;" src="{{asset('${data.image}')}}" class="img-fluid">

                        </div>

                         
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

    
    function delete_post(postid){
       
        // alert(postid);

        var post_id = postid;
        
        $('#prog').show();
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
        });

        $.ajax({
            url: "{{route('delete_post')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                post_id:post_id
            },
            success: function(response) {
                
                if(response.status)
                {
                    

                    setTimeout(function(){
                        // alert("sd");    
                    
                    $('#prog').hide();                    
                    toastr.success(response.message);

                    get_last_post();
                        
                    }, 2000);
                    

                }

            }
        });

    }
    


    function add_pined_post(postid){
       
        // alert(postid);

        var pined_post_id = postid;
        
        $('#prog').show();
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
        });

        $.ajax({
            url: "{{route('add_pined_post')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                pined_post_id:pined_post_id
                
            },
            success: function(response) {
                
                if(response.status)
                {
                    

                    setTimeout(function(){
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

</script>