
    <?php $get_all_teachers = DB::table('users')->where('role','4')->get()?>

    <div class="sidebarleft">

        <div class="most">
            <h5> All Providers </h5>
        </div>

        <div class="user recent_users">
            <ul>
                @foreach($get_all_teachers as $key => $val_teacher)
                <li>

                    @if($val_teacher->image != "")
                    <img style="height:39px; width:39px;" src="{{asset($val_teacher->image)}}" class="img-fluid">
                    @else
                    <img src="{{asset('images/commentimage1.png')}}" class="img-fluid">
                    @endif

                    <h6> {{$val_teacher->name}} <img src="{{asset('images/dotgreen.png')}}" class="img-fluid"></h6>

                </li>
                @endforeach
            </ul>

        </div>

    </div>
