@extends('layouts.main')

@section('css')
    <style>
        
        /* section-1 */
.section-1{
    padding: 50px 0 50px 0;
    background: #d5d3d2;
}
.section-1 .heading-2 {
    padding-bottom: 40px;
}
.section-1-dropdown{
    border: 1px solid var(--black-color);
    color: var(--black-color);
    padding: 0px 20px;
    height: 50px;
    border-radius: 10px;
}
.section-1-main-txt1 .heading-6 {
    padding: 10px 0 5px 0;
}
.border-line{
    border-top: 1px solid var(--white-color-1);
    margin: 20px 0 20px 0;
}
.section-1-main-txt2 .form-check{
    padding: 10px;
} 
.main-cheak{
    display: flex;
    gap: 10px;
    padding: 0 4px 0 4px;
}
.main-box-blue {
    background-color: var(--blue-color-1);
    width: 40px;
    height: 30px;
    color: var(--white-color);
    border-radius: 10px;
    font-weight: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
}
.main-box{
    color: var(--blue-color-1);
    font-size: 18px;
}
.section-1 label {
    display: inline-block;
    margin-bottom: 0.5rem;
    font-size: 13px;
}
.radio-cheak{
    display: flex;
}
.radio-cheak .checkmark--radio{
    padding-left: 10px;
}
.section-1-menu{
    background-color: var(--white-color);
    box-shadow: 0px 0px 10px -6px var(--black-color);
    border: 1px solid var(--white-color-1);
    margin-bottom: 50px;
    padding: 25px;
}
.section-1-menu-1{
    display: flex;
    justify-content: space-between;
    background-color: var(--white-color-1);
    padding: 14px;
}
.section-1-detail-txt1 .heading-6 a{ 
    color: var(--blue-color-2) !important; 
}
.section-1-detail-txt2{
    text-align: right;
}
.section-1-menu-text{
    padding: 10px;
    display: flex;
    gap: 30px;
    width: 100%;
    align-items: center;
}
.section-1-menu-img img {
    height: 280px;
}
.section-1-menu-img{
    width: 40%;
}
.section-1-menu-txt{
    width: 60%;
}
.span-txt{
    display: flex;
    gap: 12px;
    align-items: center;
}
.section-1-menu-txt .para-2 {
    padding: 8px 0 9px 0;
    margin: 0;
}
.section-1-menu-txt i{
    font-size: 20px;
    padding-left: 10px;
    color: var(--blue-color-1);
}
.section-1-menu-txt .heading-6 a{ 
    color: var(--blue-color-1) !important; 
    font-size: 16px;
}
.section-1-menu-txt .para-2 a{
    color: var(--blue-color-1) !important; 
    font-size: 14px;
}
.section-1-menu-txt .border-line {
    border-top: 1px solid var(--white-color-1);
    margin: 0px 0 10px 0;
}
.section-1-menu-txt-from{
    display: flex;
    justify-content: space-between;
    padding-top: 10px;
}
.section-1-anker a{
    padding: 10px 30px;
    font-size: 17px;
    font-weight: 600;
    color: var(--white-color);
    border-radius: 50px;
    border: 2px solid var(--purpule-color-1);
    text-decoration: none;
    transition: 0.3s ease-in-out;
}
.section-1-anker .purpul1{
    background-color: var(--purpule-color-1);
}
.section-1-anker .purpul1:hover{
    background-color: var(--purpule-color-2);
    border: 2px solid var(--purpule-color-2);
}
.section-1-anker .purpul2{
    color: var(--purpule-color-1);
}
.section-1-anker .purpul2:hover{
    background-color:  var(--purpule-color-1) !important;
    color: var(--white-color);
}

/* section-1 */


.about-sec-one {
    background-image: url(<?php echo asset('images/find_day_care.png'); ?>);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}
    
.section-1-menu-img {
    width: 35% !important;
}    
     
.section-1-menu-img img {
    height: 350px;
    width: 560px;
    border-radius: 20px;
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
                    <h2> CLAIMED CENTERS </h2>
                </div>
            </div>
        </div>
    </div>
</section>

    
        <section class="section-1">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center" style="padding-left: 150px;padding-right: 150px;">
                
                <!-- <div class="col-lg-3">
                    <div class="section-1-main-txt1">
                        <p class="para-1">Showing <strong class="small-heading">107</strong> communities</p>
                        <p class="para-1">Last Updated: 3/9/24</p>
                        <h6 class="heading-6">Sort by</h6>
                        <select class="section-1-dropdown custom-select">
                            <option selected value="recommended">Recommended</option>
                            <option value="distance">Distance</option>
                            <option value="best-rated">Best Rated</option>
                            <option value="best-staff">Best Staff</option>
                            <option value="best-activities">Best Activities</option>
                            <option value="best-meals-and-dining">Best Meals and Dining</option>
                            <option value="most-reviews">Most Reviews</option>
                        </select>
                        <h6 class="heading-6">Filter by</h6>
                        <h6 class="heading-6">Awards</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Best of Senior Living 2024
                            </label>
                        </div>
                    </div>

                    <div class="border-line"><span></span></div>

                    <div class="section-1-main-txt2">
                        <h6 class="heading-6">Review Scores</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <div class="main-cheak">
                                <div class="main-box-blue"><span>9.0</span></div>
                                <div class="main-box">-</div>
                                <div class="main-box-blue"><span>10</span></div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <div class="main-cheak">
                                <div class="main-box-blue"><span>9.0</span></div>
                                <div class="main-box">-</div>
                                <div class="main-box-blue"><span>9.4</span></div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <div class="main-cheak">
                                <div class="main-box-blue"><span>8.0</span></div>
                                <div class="main-box">-</div>
                                <div class="main-box-blue"><span>8.9</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="border-line"><span></span></div>

                    <div class="section-1-main-txt3">
                    
                    <fieldset id="DistanceFilter">
                        <h6 class="heading-6">Distance</h6>
                     <div class="radio-cheak"> 
                    <label for="5 miles" class="radio"><input type="radio" name="maxDistance" id="5 miles" value="5" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>5 miles</label>
                
                </div>  
                <div class="radio-cheak">
                     <label for="10 miles" class="radio"><input type="radio" name="maxDistance" id="10 miles" value="10" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>10 miles</label>
                    </div>
                    <div class="radio-cheak">
                     <label for="15 miles" class="radio"><input type="radio" name="maxDistance" id="15 miles" value="15" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>15 miles</label>
                     </div>
                     <div class="radio-cheak">
                     <label for="20 miles" class="radio"><input type="radio" name="maxDistance" id="20 miles" value="20" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>20 miles</label>
                     </div>
                     <div class="radio-cheak">
                     <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>25 miles</label>
                    </div>
                    </fieldset>
                    </div>

                    <div class="border-line"><span></span></div>

                    <div class="section-1-main-txt4">
                        <h6 class="heading-6">See communities with</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <div class="main-cheak">
                                <p class="para-1">5+ photos</p>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <div class="main-cheak">
                                <p class="para-1">Floor plans</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-line"><span></span></div>

                    <div class="section-1-main-txt4">
                        <h6 class="heading-6">Amenities</h6>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <div class="main-cheak">
                                <p class="para-1">Pet-friendly</p>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <div class="main-cheak">
                                <p class="para-1">Speciality meals provided</p>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <div class="main-cheak">
                                <p class="para-1">Respite care</p>
                            </div>
                        </div>

                    </div>

                    <div class="border-line"><span></span></div>

                    <div class="section-1-main-txt3">
                        <fieldset id="DistanceFilter">
                            <h6 class="heading-6">Distance</h6>
                         <div class="radio-cheak"> 
                        <label for="5 miles" class="radio"><input type="radio" name="maxDistance" id="5 miles" value="5" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>All providers</label>
                    </div>  
                    <div class="radio-cheak">
                         <label for="10 miles" class="radio"><input type="radio" name="maxDistance" id="10 miles" value="10" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Alta Senior Living</label>
                        </div>
                        <div class="radio-cheak">
                         <label for="15 miles" class="radio"><input type="radio" name="maxDistance" id="15 miles" value="15" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Meridian Senior Living</label>
                         </div>
                         <div class="radio-cheak">
                         <label for="20 miles" class="radio"><input type="radio" name="maxDistance" id="20 miles" value="20" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Greenbrier Senior Living</label>
                         </div>
                         <div class="radio-cheak">
                         <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Senior Lifestyle - Main</label>
                        </div>
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Angels Senior Living</label>
                        </div>

                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Validus Senior Living</label>
                        </div>

                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Sodalis Elder Living</label>
                        </div>

                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Pacifica Senior Living</label>
                        </div>

                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>SRI Management, LLC</label>
                        </div>
                        
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Embassy Healthcare</label>
                        </div>
                                                
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>HMP Senior Solutions</label>
                        </div>
                      
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>The Arbor Company</label>
                        </div>
                         
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Mainstay Healthcare Management</label>
                        </div>
                                                
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>ProMedica Senior Care</label>
                        </div>
                                                                        
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Brookdale</label>
                        </div>
                                                                        
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Best Care Senior Living LLC</label>
                        </div>
                                                                        
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Allegro Management Company</label>
                        </div>

                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Florida Assisted Living Management</label>
                        </div>
                        
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Discovery Management Group</label>
                        </div>
                                                
                        <div class="radio-cheak">
                        <label for="25 miles" class="radio"><input type="radio" name="maxDistance" id="25 miles" value="25" data-uw-rm-form="nfx"><span class="checkmark checkmark--radio"></span>Loving Care ALF, Inc.</label>
                        </div>
        



                        </fieldset>
                        </div>

                    <div class="border-line"><span></span></div>

                  
                </div> -->
                
                @foreach($get_all_claimed_daycare_center as $key => $val_all_claimed_daycare_center)
                <div class="col-lg-12">
                    <div class="section-1-menu">
                        <div class="section-1-menu-1">
                            <div class="section-1-detail-txt1">
                                <h6 class="heading-6"><a href="#"> {{ $val_all_claimed_daycare_center->name }} </a></h6>
                                <p class="para-2"> {{ $val_all_claimed_daycare_center->physical_address }} </p>
                            </div>
                            <div class="section-1-detail-txt2">
                                <div class="para-2">Claimed</div>
                                <!--<h6 class="heading-6">Name</h6>-->
                            </div>
                        </div>
                        <div class="section-1-menu-text">

                            <div class="section-1-menu-img">
                                <figure>
                                    <img src="{{asset($val_all_claimed_daycare_center->feature_image)}}" alt="" class="img-fluid" style="border: 1px solid #000;">
                                </figure>
                            </div>

                            <div class="section-1-menu-txt">
                                <!-- <div class="span-txt">
                                    <span class="main-box-blue">9.5</span>
                                    <strong class="small-heading">Review score</strong>
                                    <span class="main-box">76 reviews</span>
                                </div>
                                <p class="para-2">"We chose Renaissance North Tamps because it is a well kept facility,
                                    contemporary "resort" appearance and features. The staff have all been very friendly
                                    and accommodating."</p>
                                <div class="section-1-menu-txt">
                                    <i class="fas fa-paw"></i>
                                    <i class="fas fa-wifi"></i>
                                    <i class="fas fa-bus"></i>
                                </div>
                                <p class="para-2">Provides: Assisted Living, Memory Care</p> -->
                                
                                <p class="para-2">
                                    {!! $val_all_claimed_daycare_center->description !!}
                                </p>
                                
                                <!--<a href="">Read more</a>-->
                                
                                <div class="border-line"><span></span></div>
                                <div class="section-1-menu-txt-from">
                                    <!-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <strong class="small-heading">Compare</strong>
                                        </label>
                                    </div> -->
                                    <div class="section-1-anker">
                                        <!-- <a href="" class="purpul1">Get pricing</a> -->
                                        <a href="{{ URL('claimed_center_detail/'.$val_all_claimed_daycare_center->id) }}" class="btn btn-primary">See details</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                
                
                
                
            </div>
        </div>
    </section>
    

    <!-- ============================================================== -->
@endsection


@section('js')
    <script type="text/javascript">
        
        
        
    </script>
@endsection
