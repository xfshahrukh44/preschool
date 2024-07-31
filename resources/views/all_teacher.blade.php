
    <?php
    $get_all_teachers = DB::table('users')->where('role','3')->where('id', '!=', Auth::user()->id)->get();
    $connectedTeacherIds = Auth::user()->connectedTeachers->pluck('id');
    ?>

    <div class="sidebarleft">

<div class="sidebarleft">

    <div class="most">
        <h5> All Teachers </h5>
    </div>

    <div class="user recent_users">
        <ul>
            @foreach ($get_all_teachers as $key => $val_teacher)
                <li>
                    @if ($val_teacher->image != '')
                        <img style="height:39px; width:39px;" src="{{ asset($val_teacher->image) }}" class="img-fluid">
                    @else
                        <img src="{{ asset('images/commentimage1.png') }}" class="img-fluid">
                    @endif

                    @if (!empty($connectedTeacherIds))
                        <a href="{{ route('chats.show', $val_teacher->id) }}"><h6> {{$val_teacher->name}} <img src="{{asset('images/dotgreen.png')}}" class="img-fluid"></h6></a>
                        @if(in_array($val_teacher->id, json_decode($connectedTeacherIds, true)))
                        <form action="{{ route('remove.teacher', $val_teacher->id) }}" method="POST" class="remove-form" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-small">Remove</button>
                        </form>
                        @else
                        <form action="{{ route('connect.teacher', $val_teacher->id) }}" method="POST" class="connect-form" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-small">Connect</button>
                        </form>
                        @endif
                    @else
                        <h6> {{$val_teacher->name}} <img src="{{asset('images/dotgreen.png')}}" class="img-fluid"></h6>
                        <form action="{{ route('connect.teacher', $val_teacher->id) }}" method="POST" class="connect-form" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-small">Connect</button>
                        </form>
                    @endif
                </li>
                @endforeach
            </ul>

        </div>

    </div>
