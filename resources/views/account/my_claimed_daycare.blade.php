@extends('layouts.main')
@section('title', 'Account')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<style>
.about-sec-one {
    background-image: url(<?php echo asset('images/find_day_care.png'); ?>);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}

.modal-body {
    position: relative; 
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
    max-height: 590px !important;
    overflow-y: scroll !important;
}

 

</style>
@endsection
@section('content')

<?php $segment = Request::segments(); ?>

<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2> FIND DAYCARE & CLAIM </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<br><br><br>

<main class="my-cart">
    <div class="my-account-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="myaccount-page-wrapper">
                        <div class="row">
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad">
                                        <div class="myaccount-content">
                                            <div class="section-heading">
                                            
                                                <div class="row">
                                                   
                                                    <div class="col-md-12" style="margin-top:50px;"> 
                                                        
                                                        
                                                         <form method="get" class="d-flex" action="{{ route('finddaycare') }}">
                                                        
                                                            <div class="col-md-12 d-flex" > 
                                                                
                                                                <input type="text" name="search" class="form-control" placeholder="Enter State Name" value="{{$search}}" style="width: 50% !important; margin-left: 200px;" required/>
                                                                &nbsp;&nbsp;
                                                                <button type="submit" class="btn btn-primary" style="width: 25%; height: 50px;" > FIND YOUR DAYCARE CENTER </button>
                                                                
                                                            </div>
                                                        
                                                        </form>
                                                        
                                                        <hr>
                                                        
                                                        <br><br>

                                         
                                                        <table id="example1" style="width:100%;" class="table table-hover table-bordered table-striped text-center">
                                                          
                                                            <thead>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <th>Name</th>
                                                                    <th>County</th>
                                                                    <th>City</th>
                                                                    <th>Address</th>
                                                                    <th>Zip</th>
                                                                    <th>Phone</th>
                                                                </tr>
                                                            </thead>
                                                          
                                                            <tbody>
                                                                @foreach($climedchildCare as $key => $value) 
                                                                    <tr>
                                                                        <td> <?php if($value->claim_status == 2){ echo "CLAIMED";}else{ echo "CLAIM"; } ?> </td>
                                                                        <td>{{$value->name ? $value->name : 'N\A' }}</td>
                                                                        <td>{{$value->county ? $value->county : 'N\A'}}</td>
                                                                        <td>{{$value->city ? $value->city : 'N\A'}}</td>
                                                                        <td>{{$value->physical_address ? $value->physical_address : 'N\A'}}</td>
                                                                        <td>{{$value->zip ? $value->zip : 'N\A'}}</td>
                                                                        <td>{{$value->phone ? $value->phone : 'N\A'}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                          
                                                        </table>
                                                        
                                                    </div>
                                                   
                                
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
    
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->


<!-- main content end -->   
</main>

<br><br><br>

@endsection
@section('js')



@endsection