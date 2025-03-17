<?php
$get_all_teachers = DB::table('users')
    ->where('role', '3')
    ->where('id', '!=', Auth::user()->id)
    ->get();
$connectedTeacherIds = Auth::user()->connectedTeachers->pluck('id');
?>


<div class="sidebarleft">

    @php
        $saved_projects = auth()->user()->saved_projects ?? [];
    @endphp
    @if(count($saved_projects))
        <div class="most">
            <h5>Your saved projects</h5>
        </div>
        <div class="project user recent_users">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('projects.index')}}" method="GET">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input type="text" class="form-control-sm" placeholder="Search projects" name="search" value="{{request()->get('search')}}">
                            </div>
                            <div class="col-lg-4 form-group text-left">
                                <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <ul>
                @foreach ($saved_projects as $key => $saved_project)
                    <li>
                        @if ($saved_project->project->images()->first())
                            <img style="height:39px; width:39px;" src="{{ asset($saved_project->project->images()->first()->path) }}" class="img-fluid">
                        @else
                            <img src="{{ asset('images/commentimage1.png') }}" class="img-fluid">
                        @endif

                        <a href="{{ route('projects.show', $saved_project->project->id) }}">
                            <h6> {{ $saved_project->project->title }} <img src="{{ asset('images/dotgreen.png') }}" class="img-fluid"></h6>
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
    @endif

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
                        <a href="{{ route('chats.show', $val_teacher->id) }}">
                            <h6> {{ $val_teacher->name }} <img src="{{ asset('images/dotgreen.png') }}"
                                    class="img-fluid"></h6>
                        </a>
                        @if (in_array($val_teacher->id, json_decode($connectedTeacherIds, true)))
                            <form action="{{ route('remove.teacher', $val_teacher->id) }}" method="POST"
                                class="remove-form" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-small"><i
                                        class="fa fa-remove"></i></button>
                            </form>
                        @else
                            <form action="{{ route('connect.teacher', $val_teacher->id) }}" method="POST"
                                class="connect-form" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-small"><i
                                        class="fa fa-plus"></i></button>
                            </form>
                        @endif
                    @else
                        <h6> {{ $val_teacher->name }} <img src="{{ asset('images/dotgreen.png') }}" class="img-fluid">
                        </h6>
                        <form action="{{ route('connect.teacher', $val_teacher->id) }}" method="POST"
                            class="connect-form" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-small"><i class="fa fa-plus"></i></button>
                        </form>
                    @endif
                    <a href="{{ route('chats.show', $val_teacher->id) }}" class="btn btn-success btn-small"
                        title="message"><i class="fas fa-comment-alt"></i></a>
                </li>
            @endforeach
        </ul>

    </div>


    <div class="most">
        <h5> Job Board </h5>
    </div>
    <div class="job_view">
        @php
            $get_all_new_job = DB::table('job_posts')->where('status', '1')->get();
        @endphp
        @foreach ($get_all_new_job as $value)
            <div class="flex-eye">
                <div class="center-info">
                    <h6> {{ $value->job_title }} </h6>
                    <p><a href="#"><i class="fa-solid fa-location-dot"></i> {{ $value->location }} </a></p>
                </div>
                <div class="apply">
                    <a href="{{ route('apply_for_job', ['id' => $value->id]) }}" class="custom-btn now btn-sm"><i
                            class="fa-solid fa-eye"></i></a>
                </div>
            </div>
        @endforeach
    </div>


</div>
