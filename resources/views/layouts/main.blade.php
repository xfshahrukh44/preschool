<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Admin">
        <meta name="author" content="Admin">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset(!empty($favicon->img_path)?$favicon->img_path:'')}}">
        

        <title>{{ config('app.name') }}</title>
        <!-- ============================================================== -->
        <!-- All CSS LINKS IN BELOW FILE -->
        <!-- ============================================================== -->
        @include('layouts.front.css')
        @yield('css')
        <style>

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

            .myaccount-tab-menu.nav .active, .myaccount-tab-menu.nav a:hover {
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
            .editable-wrapper a.edit{
                background-color: #007bff;
            }
        </style> 
    </head>
    <body class="responsive">
      

        @include('layouts/front.header')
		
	

		
        @yield('content')

        <div class="modal fade" id="providerAlert" data-bs-keyboard="false" tabindex="-1" aria-labelledby="providerAlertLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="providerAlertLabel">Account required</h5>
{{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    </div>
                    <div class="modal-body">
                        <p>
                            <b>Before you claim center, please sign up or log in to the website.</b>
                        </p>
                        <hr>

                        <span><a href="{{route('become-a-provider')}}" class="text-center">Signup</a> as a provider.</span>
                        <hr>
                        <span>Already have a provider account? <a href="{{route('signin')}}" class="text-center">Login</a>.</span>
                    </div>
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-primary">Understood</button>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>

        
        @include('layouts/front.footer')
        <!-- ============================================================== -->
        <!-- All SCRIPTS ANS JS LINKS IN BELOW FILE -->
        
        


        
        <!-- ============================================================== -->
        @include('layouts/front.scripts')

{{--        <script>--}}
{{--            $('#providerAlert').modal('show');--}}
{{--        </script>--}}
        


    </body>
</html>