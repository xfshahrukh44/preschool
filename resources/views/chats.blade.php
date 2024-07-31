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

    .myaccount-tab-menu.nav .active,
    .myaccount-tab-menu.nav a:hover {
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

    .editable-wrapper a.edit {
        background-color: #007bff;
    }

    .profilebg1 {
        margin-top: -16px;
    }

    .tab-content {
        height: 750px;
        overflow-y: scroll;
    }

    .tab-content::-webkit-scrollbar-thumb {
        background: #25D366;
    }

    .messg-info .left_messg {
        width: auto;
        margin-left: 50px;
        margin-bottom: 30px;
        justify-content: end !important;
    }

    .messg-info .right_messg {
        margin-bottom: 30px;
    }

    .messg-info .time_show {
        position: relative;
        z-index: 0;
        display: flex;
        align-items: baseline;
        justify-content: start;
        gap: 20px;
    }

    #dynamicTextarea span {
        /* position: absolute; */
        z-index: 0;
        right: 10px;
        top: 5px;
    }

    .chat_picture {
        /* display: flex; */
        align-items: center;
        gap: 20px;
        /* position: absolute; */
        z-index: 0;
        left: -50px;
    }

    .chat_picture p {
        margin: 0;
        line-height: 0;
    }

    #dynamicTextarea p {
        margin: 0;
        /* position: absolute; */
        z-index: 0;
        top: 5px;
        left: 10px;
        font-size: 22px;
        font-weight: 600;
        color: black;
    }

    .left_messg .para_chat {
        /* padding-left: 50px !important; */
        /* padding-right: 15px !important; */
    }

    .show_mssg {
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* position: absolute; */
        z-index: 0;
        top: 5px;
        gap: 10px;
        width: 100%;
        padding: 2px 15px;
    }

    .left_messg .show_mssg {
        flex-flow: row-reverse;
    }

    .show_result {
        padding-top: 5px !important;
        padding-right: 50px !important;
        padding-left: 15px;
        padding-bottom: 10px;
    }

    .left_messg .show_result {
        /* padding-right: 15px !important; */
        /* padding-left: 50px !important; */
    }

    .chat_picture img {
        width: 50px;
        height: 50px;
        max-width: 50px;
    }

    .left_messg div#dynamicTextarea {
        background: #25D366;
        color: white !important;
        border-radius: 10px;
    }

    .left_messg #dynamicTextarea p {
        color: white !important;
    }

    .bottom-type-input {
        position: relative;
        z-index: 0;
    }

    .bottom-type-input input {
        border: 1px solid #0000003b;
        border-radius: 5px;
        background: #e9ecef78;
        margin-bottom: 18px;
    }

    .bottom-type-input button {
        position: absolute;
        z-index: 0;
        right: 0;
        top: 0px;
    }

    .right_messg #dynamicTextarea {
        background: #e9ecef78;
        border-radius: 10px;
    }
</style>

<body>

    @include('layouts.front.css')
    @include('layouts/front.header')


    <section class="back">

        <div class="container-fluid">

            <div class="profilebg1" style="<?php if (Auth::user()->banner_image != '') {
                echo "background-image: url('" . asset(Auth::user()->banner_image) . "') !important;";
            } else {
                echo 'background-image: url(' . asset('images/profilebg.png') . ') !important;';
            } ?> background-size: cover !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile1">
                            @if (Auth::user()->image != '')
                                <img src="{{ asset(Auth::user()->image) }}" style="height:175px; width:175px;"
                                    class="img-fluid">
                            @else
                                <img src="{{ asset('images/profilemain1.png') }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="profile-name-bg">
                <div class="row">

                    <div class="col-md-3">
                        <div class="profile-name">
                            <h5> {{ Auth::user()->name }} {{ Auth::user()->lname }} <span> {{ Auth::user()->email }}
                                </span></h5>
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
                    <div class="tab-content">
                        <div class="profile-disctiption chat_list">
                            <div class="chat_item">
                                <h6>Clark Kent</h6>
                            </div>
                        </div>
                        <div class="chating_section">
                            <div class="messg-info">
                                <div class="right_messg time_show">
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, nobis
                                            eaque?
                                            Aut, voluptatibus dolores reprehenderit et laudantium explicabo labore
                                        </div>
                                    </div>
                                </div>
                                <div class="left_messg time_show">

                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, nobis
                                            eaque?
                                            Aut, voluptatibus dolores reprehenderit et laudantium explicabo labore
                                            soluta
                                            iure delectus mollitia quidem quis animi. Labore deserunt natus hic.
                                        </div>
                                    </div>
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                </div>
                                <div class="right_messg time_show">
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            ok
                                        </div>
                                    </div>
                                </div>
                                <div class="left_messg time_show">

                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem ipsum dolor sit amet consectetur
                                        </div>
                                    </div>
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                </div>

                                <div class="left_messg time_show">

                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            ok
                                        </div>
                                    </div>
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                </div>
                                <div class="right_messg time_show">
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. In voluptates earum
                                            explicabo aperiam animi reprehenderit, cupiditate cumque ea. Architecto
                                            minus fugit perspiciatis ipsum, maxime recusandae, amet quos tempore vero
                                            mollitia dicta magni nisi ad numquam fugiat! Vero, repellat? Est, voluptate
                                            error id iusto nulla voluptatibus autem porro obcaecati officiis enim
                                            incidunt doloribus illum possimus quas non illo atque dignissimos explicabo!
                                        </div>
                                    </div>
                                </div>
                                <div class="left_messg time_show">

                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates dolor
                                            saepe dolorum. Quibusdam aliquid sequi rem molestias, at eaque, laborum
                                            provident, alias ut earum eligendi voluptatem dolore consequatur accusantium
                                            repellendus vitae? Neque laudantium fugit sunt hic, est placeat harum saepe.
                                            Culpa id suscipit adipisci voluptatum. Dolore ipsa delectus totam rem error
                                            eos nobis, aut fugiat at necessitatibus in neque alias cupiditate laboriosam
                                            ut ratione officia quaerat deleniti aperiam obcaecati reprehenderit
                                            similique, vero ipsum eum? Libero repudiandae tenetur animi quod corporis
                                            nihil eaque numquam alias sapiente voluptates repellendus magni, ratione
                                            labore mollitia incidunt nobis eveniet eos excepturi distinctio unde
                                            aliquam. Nam, harum inventore pariatur est consequuntur enim ex molestiae
                                            culpa numquam tempora recusandae repudiandae explicabo, repellendus
                                            cupiditate, aliquid consequatur qui nisi magnam fugiat. Totam voluptatem
                                            possimus nesciunt vero autem quia at! Nesciunt cum ullam deleniti impedit
                                            repellat saepe ex? Nisi veniam exercitationem nulla, illum quae cupiditate
                                            alias iste aliquam at possimus tenetur impedit ducimus similique odit
                                            molestias omnis nihil et? Fugit distinctio numquam rerum? Nesciunt vel
                                            eligendi repellat obcaecati, consequuntur soluta itaque aliquam odio commodi
                                            natus et aut libero maiores aliquid quas beatae delectus dicta enim harum,
                                            quasi nam. Excepturi voluptates dolorem, reprehenderit qui nostrum deserunt!
                                            Harum minima obcaecati accusantium atque?
                                        </div>
                                    </div>
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                </div>

                                <div class="right_messg time_show">
                                    <div class="chat_picture">
                                        <img src="http://127.0.0.1:8000/images/commentimage1.png" class="img-fluid">
                                    </div>
                                    <div id="dynamicTextarea" class="para_chat" oninput="adjustTextareaSize()">
                                        <div class="show_mssg">
                                            <p class="client_name_show">Renee</p>
                                            <span>5:45</span>
                                        </div>
                                        <div class="show_result">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-type-input">
                                <input type="" id="messg_type" placeholder="" class="form-control">
                                <button type="submit" class="btn btn-send"><img src="{{ asset('images/send.png') }}"
                                        class="img-fluid" alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 sidebarleftprofile">

                    @include('all_teacher')

                </div>


            </div>
        </div>

    </section>


    @include('footerlink')

    <!-- Sandbox terms modal -->
    <div class="modal fade" id="modal_agree_to_sandbox_terms" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sandbox terms</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h6>Community Guidelines</h6>
                        </div>
                        <div class="col-12">
                            <p>
                                Welcome to the Sandbox!
                            </p>
                            <p>
                                The Sandbox is meant to be a place to interact with other professionals while at work;
                                learn from others, build relationships, and otherwise just ‘hang out’. This is the
                                spirit in which these guidelines have been established. The discussions and the way all
                                members and Preschool Portal employees are treated are always to be professional. The
                                general rule of thumb to follow is that if the talk is inappropriate for a traditional
                                workplace, then it is not appropriate here. Forums like the Sandbox are at their best
                                when participants treat each other with respect and courtesy. Please be mindful of this
                                when participating here in the Sandbox.
                            </p>
                            <p>
                                Preschool Portal will occasionally move discussions if they belong in a different
                                category. We will also close/remove duplicate discussions and/or replies if they are
                                causing confusion, are mean-spirited, or are otherwise inappropriate (see our
                                Do’s/Don’ts below). Our intention is not to censor, but to foster an environment that is
                                easy to use and productive for all those involved.
                            </p>
                        </div>
                        <div class="col-12 text-center">
                            <a target="_blank" href="{{ route('rules-of-conduct-individual') }}">Rules of conduct</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <a href="{{ route('agree_to_sandbox_terms') }}" type="button" class="btn btn-primary">I agree to
                        the terms</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {

            if (parseInt('{{ \Illuminate\Support\Facades\Auth::user()->agreed_to_sandbox_terms }}') == 0) {
                $('#modal_agree_to_sandbox_terms').modal({
                    keyboard: false
                });
                $('#modal_agree_to_sandbox_terms').modal('show');
            }
        });
    </script>


</body>

</html>


<script>
    $("#save_post").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);


        $.ajax({
            url: "{{ route('teacher_create_new_post') }}",
            type: 'POST',
            data: formData,
            success: function(response) {

                // toastr.success(response.message);

                // $('.comment_div').empty();

                if (response.status) {
                    $('#prog').show();

                    setTimeout(function() {
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


    function get_last_post() {

        $.ajax({
            url: "{{ route('get_last_post') }}",
            type: 'GET',
            success: function(response) {

                // toastr.success(response.message);
                $('.comment_div').empty();

                if (response.status) {

                    // toastr.success(response.message);
                    console.log(response.get_last_post);

                    var data = response.get_last_post;
                    var post_user_image = response.p_u_profile;
                    var dayago = response.dayago;

                    let post_image_string = data.image ? `<div class="newfeed-image">

                            <img style="height:400px; width:100%; border-radius:10px;" src="{{ asset('${data.image}') }}" class="img-fluid">

                        </div>` : ``;


                    $('.comment_div').append(
                        `<div class="newfeed">

                        <input type="hidden" name="" id="get_id" value="{{ '${data.id}' }}">

                        <div class="newfeed-profile-name">

                            <img style="height:60px; width:60px; border-radius:50px" src="${post_user_image}" class="img-fluid">

                            <h4> {{ '${data.user_name}' }} <span> {{ '${dayago}' }} </span></h4>

                            <button class="btn btn-danger" style="position:absolute; right:50px;" onClick="delete_post({{ '${data.id}' }})"> <span class="fa fa-trash" > </span> </button>

                        </div>

                        <div class="newfeed-image">

                            <p> {{ '${data.post}' }} </p>

                        </div>

                        ` + post_image_string + `


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


    function delete_post(postid) {

        // alert(postid);

        var post_id = postid;

        $('#prog').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('delete_post') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                post_id: post_id
            },
            success: function(response) {

                if (response.status) {


                    setTimeout(function() {
                        // alert("sd");

                        $('#prog').hide();
                        toastr.success(response.message);

                        get_last_post();

                    }, 2000);


                }

            }
        });

    }


    function add_pined_post(postid) {

        // alert(postid);

        var pined_post_id = postid;

        $('#prog').show();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('add_pined_post') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                pined_post_id: pined_post_id

            },
            success: function(response) {

                if (response.status) {


                    setTimeout(function() {
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

    $(document).ready(function() {
        // Use event delegation to handle dynamic forms
        $(document).on('submit', 'form.connect-form', function(e) {
            e.preventDefault();

            var $form = $(this);
            var actionUrl = $form.attr('action');

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: $form.serialize(),
                success: function(response) {
                    var url = "{{ url('teacher/remove/') }}/" + response.user_id;
                    $form.find('button').attr('disabled', true);

                    var $listItem = $form.closest('li');
                    $listItem.find('form.remove-form')
                        .remove(); // Ensure only one remove form is present
                    $listItem.append('<form action="' + url +
                        '" method="POST" class="remove-form" style="display:inline;">' +
                        '@csrf' +
                        '<button type="submit" class="btn btn-danger btn-small">Remove</button>' +
                        '</form>');
                    $form.remove();
                },
                error: function(xhr) {
                    alert('Failed to connect. Please try again.');
                }
            });
        });

        $(document).on('submit', 'form.remove-form', function(e) {
            e.preventDefault();

            var $form = $(this);
            var actionUrl = $form.attr('action');

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: $form.serialize(),
                success: function(response) {
                    var $listItem = $form.closest('li');
                    $form.find('button').attr('disabled', true);
                    var url = "{{ url('teacher/connect/') }}/" + response.user_id;
                    $form.remove();

                    if ($listItem.find('form.connect-form').length === 0) {
                        $listItem.append('<form action="' + url +
                            '" method="POST" class="connect-form" style="display:inline;">' +
                            '@csrf' +
                            '<button type="submit" class="btn btn-primary btn-small">Connect</button>' +
                            '</form>');
                    }
                },
                error: function(xhr) {
                    alert('Failed to remove. Please try again.');
                }
            });
        });
    });
</script>
