@section('title','Register')
@extends('layouts.main')
@section('css')
<style>


.about-sec-one {
    background-image: url({{asset('images/9.png')}});
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 450px;
    display: flex;
    align-items: center;
}


.form-container.sign-up-container {
    border: 1px solid #000;
    box-shadow: 10px 15px 15px #9e9e9e;
    padding: 20px;
    border-radius: 25px;
}

.form-container.sign-in-container {
    border: 1px solid #000;
    box-shadow: 10px 15px 15px #9e9e9e;
    padding: 20px;
    border-radius: 25px;
}


</style>
@endsection
@section('content')


<section class="about-sec-one Teacher-Banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="about-us" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1000">
                    <h2> LOG IN </h2>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="account container">

        <br><br><br>
   
        <div class="row" id="from-wrapper">
        
            <!-- <div class="col-md-6">
                <div class="form-container sign-up-container">
                    <form  method="POST" action="{{ route('register') }}">
                        @csrf

                        <input type="hidden" name="role" id="role" value="1">

                        <h4 style="color:#000;"> SIGN UP </h4> <hr>

                        <div class="form-group">
                            <label>Username*</label>
                            <input type="text" class="form-control {{ $errors->registerForm->has('name') ? ' is-invalid' : '' }}" name="name" id="name"required>
                            @if ($errors->registerForm->has('name'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('name') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email Address*</label>
                            <input type="email" class="form-control {{ $errors->registerForm->has('email') ? ' is-invalid' : '' }}" name="email" id="signup-email" required>
                            @if ($errors->registerForm->has('email'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->first('email') }}</small>
                            @endif
                        </div>


                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" class="form-control {{ $errors->registerForm->has('password') ? ' is-invalid' : '' }}" name="password" id="signup-password" required>
                            @if ($errors->registerForm->has('password'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->first('password') }}</small>
                            @endif
                        </div>

                        <hr>

                        <button class="custom-btn" type="submit">Sign Up</button>

                    </form>
                </div>

            </div> -->

            <div class="col-md-2">
            </div>
            
            <div class="col-md-8">

                <div class="form-container sign-in-container">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h4 style="color:#000;"> LOGIN </h4> <hr>
                        <div class="form-group">
                            <label>Username or email address*</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            @if ($errors->has('password'))
                            <small class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <hr>
                        <div class="form-group" style="margin-top: 45px !important;">
                            <!-- <label class="remember"><input type="checkbox"> Remember me </label> -->
                            <!--<a href="{{ url('password/reset') }}" class="pull-right forg_text"> Forgot password? </a>-->
                        </div>
                        <hr>
                        <button class="custom-btn" type="submit">Login</button>
                        
                        <!-- <span>or</span>
                        <div class="social-group">
                            <button class="loginBtn loginBtn--facebook">Login with Facebook</button>
                            <button class="loginBtn loginBtn--google">Login with Google</button>
                        </div> -->

                    </form>
                </div>
        
            </div>

            
            <div class="col-md-2">
            </div>
            

    
        </div>
    
        <br>

</section>

<br><br><br>

@endsection
@section('js')
<script>
    $("#phone").on("keypress keyup blur",function (event) {    
       $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
</script>
@endsection