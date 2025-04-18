<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\banner;
use App\imagetable;
use DB;
use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\Models\Job_post;
use App\Models\Request_job;
use App\Models\Post;
use App\Models\Pined_post;
use App\Models\Comment;
use App\Models\Like;
use App\Angel;
use App\Childcare;
use App\Page;
use App\User;
use App\Models\State;
use App\Models\City;
use Image;
use Carbon\Carbon;
use DateTime;
use App\Models\SharedGallery;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    use HelperTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // use Helper;


    public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
            select('img_path')
            ->where('table_name', '=', 'logo')
            ->first();

        $favicon = imagetable::
            select('img_path')
            ->where('table_name', '=', 'favicon')
            ->first();

        View()->share('logo', $logo);
        View()->share('favicon', $favicon);

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $page = DB::table('pages')->where('id', 1)->first();
        $section = DB::table('section')->where('page_id', 1)->get();
        $banner = DB::table('banners')->where('id', 1)->first();

        return view('welcome', compact('page', 'section', 'banner'));
    }


    public function about()
    {
        $page = DB::table('pages')->where('id', 2)->first();
        $section = DB::table('section')->where('page_id', 2)->get();


        return view('about', compact('page', 'section'));
    }


    public function claimed_center()
    {

        $page = DB::table('pages')->where('id', 2)->first();
        $section = DB::table('section')->where('page_id', 2)->get();

        $get_all_claimed_daycare_center = DB::table('childcares')->where('claim_status', '2')->where('status', '1')->get();

        return view('claimed_center', compact('page', 'section', 'get_all_claimed_daycare_center'));

    }

    public function angelList()
    {

        $page = DB::table('pages')->where('id', 2)->first();
        $section = DB::table('section')->where('page_id', 2)->get();
        // $user = DB::table('users')->where('page_id', 2)->get();

        $angel = Angel::with('job', 'creator')->where('creator_id', Auth::user()->id)->get();

        return view('angel-list', compact('page', 'section', 'get_all_claimed_daycare_center', 'angel'));

    }

    public function deleteAngel($id)
    {
        $angel = Angel::find($id);

        if ($angel) {
            $angel->delete();

            return response()->json(['success' => 'Angel has been deleted successfully.']);
        } else {
            return response()->json(['error' => 'Angel not found.'], 404);
        }
    }


    public function store(Request $request)
    {

        $review = new Review($request->all());

        $review->save();
        return redirect()->back()->with('message', 'Review added!');

    }


    public function claimed_center_detail($id = "")
    {

        $page = DB::table('pages')->where('id', 2)->first();
        $section = DB::table('section')->where('page_id', 2)->get();

        $get_claimed_daycare_center_detail = DB::table('childcares')->where('id', $id)->where('claim_status', '2')->where('status', '1')->first();
        $get_reviews = DB::table('reviews')->where('daycareid', $id)->take(5)->get();
        $claimant = User::find($get_claimed_daycare_center_detail->claimed_by_id);

        return view('claimed_center_detail', compact('page', 'section', 'get_reviews', 'get_claimed_daycare_center_detail', 'claimant'));

    }
    // public function claimed_center_detail($id = "")
    // {

    //     $page = DB::table('pages')->where('id', 2)->first();
    //     $section = DB::table('section')->where('page_id', 2)->get();

    //     $get_claimed_daycare_center_detail = DB::table('childcares')->where('id', $id)->where('claim_status', '2')->where('status', '1')->first();
    //     $get_reviews = DB::table('reviews')->where('daycareid', $id)->take(5)->get();
    //     $claimant = User::find($get_claimed_daycare_center_detail->claimed_by_id);

    //     return view('claimed_center_detail', compact('page', 'section', 'get_reviews', 'get_claimed_daycare_center_detail', 'claimant'));

    // }


    public function teacher()
    {
        $page = DB::table('pages')->where('id', 3)->first();
        $section = DB::table('section')->where('page_id', 3)->get();

        $get_teacher = DB::table('users')->where('role', '3')->get();

        return view('teacher', compact('page', 'section', 'get_teacher'));
    }


    public function provider()
    {
        $page = DB::table('pages')->where('id', 4)->first();
        $section = DB::table('section')->where('page_id', 4)->get();


        return view('provider', compact('page', 'section'));
    }


    public function contact()
    {
        $page = DB::table('pages')->where('id', 5)->first();
        $section = DB::table('section')->where('page_id', 5)->get();


        return view('contact', compact('page', 'section'));
    }


    public function become_a_teacher()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        $page = DB::table('pages')->where('id', 5)->first();
        $section = DB::table('section')->where('page_id', 5)->get();


        return view('become-a-teacher', compact('page', 'section'));
    }


    public function become_a_provider()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        $page = DB::table('pages')->where('id', 5)->first();
        $section = DB::table('section')->where('page_id', 5)->get();


        return view('become-a-provider', compact('page', 'section'));
    }

    public function checkEmailExistence(Request $request)
    {
        $email = $request->input('email');

        // Check if the email exists in the database
        $exists = User::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }

    public function sharedGallery()
    {

        $gallery = DB::table('shared_galleries')->get();
        $page = DB::table('pages')->where('id', 14)->first();
        return view('sharedgallery', compact('gallery', 'page'));

    }

    public function gallery_detail($id)
    {
        $galleryDetail = SharedGallery::find($id);
        $comment = Comment::where('post_id', $galleryDetail->id)->where('reply_id', '=', null)->get();

        return view('gallery-detail', compact('galleryDetail', 'comment'));
    }

    public function commentSubmit(Request $request)
    {
        // dd($request->all());
        Comment::create($request->all());

        return back()->with('message', 'Comment Submitted successfully');
    }

    public function replySubmit(Request $request)
    {
        // dd($request->all());
        Comment::create($request->all());

        return back()->with('message', 'Reply Submitted successfully');
    }

    public function joinnow()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        $page = DB::table('pages')->where('id', 5)->first();
        $section = DB::table('section')->where('page_id', 5)->get();


        return view('joinnow', compact('page', 'section'));
    }


    public function search(Request $request)
    {
        $page = DB::table('pages')->where('id', 2)->first();
        $section = DB::table('section')->where('page_id', 2)->get();

        $search = $request->input('search', '');
        $authUserId = Auth::user()->id;

        $query = Childcare::where('status', '1')
            ->where('name', '!=', '')
            ->orderByRaw("CASE WHEN claimed_by_id = ? THEN 0 ELSE 1 END", [$authUserId]) // Prioritize claimed records
            ->orderBy('name', 'ASC');

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', "%".$request->name."%");
        }

        if ($request->filled('city')) {
            $query->where('city', 'LIKE', "%{$request->city}%");
        }

        if ($request->filled('state')) {
            $query->where('state', 'LIKE', "%{$request->state}%");
        }

        if ($request->filled('age_accepted')) {
            $ages = array_filter($request->input('age_accepted')); // remove null/empty values

            if (!empty($ages)) {
                $query->where(function ($q) use ($ages) {
                    foreach ($ages as $age) {
                        $q->orWhere('age_accepted', 'LIKE', "%$age%");
                    }
                });
            }
        }

        $search_result = $query->paginate(25)->onEachSide(0);


        return view('search', compact('page', 'section', 'search_result', 'search'));
    }

    public function searchStates(Request $request)
    {
        $query = $request->input('query', '');
        if ($query == '') {
            $states = [];
            return response()->json($states);
        }
        $page = $request->input('page', 0);
        $limit = 10;

        $states = State::where('name', 'like', "%$query%")
            ->offset($page * $limit)
            ->limit($limit)
            ->get(['id', 'name']); // Fetch only required fields

        return response()->json($states);
    }

    public function searchCities(Request $request)
    {
        $stateId = $request->input('state_id');
        $query = $request->input('query', '');
        $page = $request->input('page', 0);
        $limit = 10;

        $cities = City::where('state_id', $stateId)
            ->where('name', 'like', "%$query%")
            ->offset($page * $limit)
            ->limit($limit)
            ->get(['id', 'name']); // Fetch only required fields

        return response()->json($cities);
    }


    public function termsandconditionindividual()
    {
        $page = DB::table('pages')->where('id', 10)->first();

        return view('termsandconditionindividual', compact('page'));
    }

    public function termsandconditionprovider()
    {
        $page = DB::table('pages')->where('id', 11)->first();

        return view('termsandconditionprovider', compact('page'));
    }

    public function privacy()
    {
        $page = DB::table('pages')->where('id', 12)->first();

        return view('privacy', compact('page'));
    }

    public function community()
    {
        $page = DB::table('pages')->where('id', 13)->first();

        return view('community', compact('page'));
    }


    // ============================================ Teacher Dashboard Section ======================================== //

    public function teacher_dashboard()
    {

        if (Auth::user()->role != "3") {
            return redirect("/");
        }

        $get_all_teacher = DB::table('users')->where('role', '3')->get();
        $get_last_post = DB::table('posts')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        // dd($get_last_post);

        return view('teacher_dashboard', compact('get_all_teacher', 'get_last_post', 'get_all_new_job'));
    }

    public function connect($id)
    {
        $user = auth()->user();

        if ($user->id == $id) {
            return response()->json(['error' => 'Cannot connect to yourself.'], 400);
        }

        $connectedTeacher = User::find($id);

        if ($connectedTeacher) {
            $user->connectedTeachers()->attach($id);
            return response()->json(['success' => 'Connected with teacher.', 'user_id' => $connectedTeacher->id]);
        }

        return response()->json(['error' => 'Teacher not found.'], 404);
    }

    public function remove($id)
    {
        $user = auth()->user();

        $connectedTeacher = User::find($id);

        if ($connectedTeacher) {
            $user->connectedTeachers()->detach($id);
            return response()->json(['success' => 'Teacher removed.', 'user_id' => $connectedTeacher->id]);
        }

        return response()->json(['error' => 'Teacher not found.'], 404);
    }


    public function my_pinned()
    {
        $userid = Auth::user()->id;
        $get_my_pinned = DB::table('pined_posts')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('my_pinned', compact('get_my_pinned'));

    }


    public function teacher_post()
    {
        if (Auth::user()->role != "3" && Auth::user()->role != "4") {
            return redirect("/");
        }

        $sharedPost = DB::table('post_shares')->where('shared_by', Auth::user()->id)->get();
        // Extract post IDs and notes
        $sharedPostIds = $sharedPost->pluck('post_id');
        $sharedNotes = $sharedPost->pluck('note', 'post_id');

        if (Auth::user()->role == "3") {
            $connectedTeacherIds = Auth::user()->connectedTeachers->pluck('id');
            $get_all_teachers = DB::table('users')->whereIn('id', $connectedTeacherIds)->get();
            $connectedTeacherIds[] = Auth::user()->id;

            //       $get_last_post = DB::table('posts')->orderBy('id', 'desc')->get();
            $get_last_post = Post::where('role_id', Auth::user()->role)->whereIn('user_id', $connectedTeacherIds)->orderBy('id', 'desc')
                ->when(request()->has('search'), function ($q) {
                    return $q->where('post', 'LIKE', '%' . request()->get('search') . '%');
                })
                ->get();
            //       $get_all_teachers = DB::table('users')->where('role','3')->get();
        } else {
            $get_last_post = Post::where('role_id', Auth::user()->role)->orderBy('id', 'desc')
                ->when(request()->has('search'), function ($q) {
                    return $q->where('post', 'LIKE', '%' . request()->get('search') . '%');
                })
                ->get();

            // return $get_last_post;


            $get_all_teachers = DB::table('users')->where('role', Auth::user()->role)->get();
        }

        return view('teacher_post', compact('get_last_post', 'post_user_profile', 'dayago', 'get_all_teachers', 'sharedPostIds'));

    }


    public function job_board()
    {
        if (Auth::user()->role != "3") {
            return redirect("/");
        }
        $page = DB::table('pages')->where('id', 7)->first();
        $section = DB::table('section')->where('page_id', 7)->get();
        $get_all_new_job = DB::table('job_posts')->where('status', '1')->get();
        return view('job_board', compact('page', 'section', 'get_all_new_job'));

    }


    public function bulletin()
    {
        $page = DB::table('pages')->where('id', 5)->first();
        $section = DB::table('section')->where('page_id', 5)->get();


        return view('bulletin_board');
    }


    public function apply_for_job($jobid = '')
    {

        if (Auth::user()->role != "3") {
            return redirect("/");
        }

        $page = DB::table('pages')->where('id', 8)->first();
        $section = DB::table('section')->where('page_id', 8)->get();

        $get_all_new_job_byid = DB::table('job_posts')->where('status', '1')->where('id', $jobid)->first();

        return view('apply_for_job', compact('page', 'section', 'get_all_new_job_byid'));

    }

    public function become_an_angel($jobid, $creatorId)
    {
        if (Auth::user()->role != "3") {
            return redirect("/");
        }

        $userId = Auth::user()->id;

        $existingAngel = Angel::where('teacher_id', $userId)
            ->where('job_id', $jobid)
            ->first();

        if ($existingAngel) {
            return response()->json(['error' => 'You are already an angel for this job.']);
        }

        $angel = new Angel();
        $angel->teacher_id = $userId;
        $angel->job_id = $jobid;
        $angel->creator_id = $creatorId;
        $angel->save();

        return response()->json(['success' => 'You added the angel list.']);
    }

    public function checkAngel($jobid, $creatorId)
    {
        $userId = Auth::user()->id;

        $existingAngel = Angel::where('teacher_id', $userId)
            ->where('job_id', $jobid)
            ->first();

        if ($existingAngel) {
            return response()->json(['exists' => true]);
        } else {
            return response()->json(['exists' => false]);
        }
    }


    public function save_apply_for_job(Request $request)
    {

        // dd($request->all());

        $request_job = new Request_job($request->all());

        if ($request->hasFile('resume')) {

            $file = $request->file('resume');
            $fileName = $file->getClientOriginalName();
            $folderName = '/uploads/resume/';
            $destinationPath = public_path() . $folderName;
            // dd($destinationPath);
            $file->move($destinationPath, $fileName);

            $full_path = $folderName . $fileName;

            $request_job->resume = $full_path;
        }

        $request_job->save();

        $provider = User::find($request->job_creator_id);

        if($provider->email) {
            Mail::send('emails.job_application', ['requestJob' => $request_job], function ($message) use ($request_job, $provider) {
                $message->to($provider->email)
                        ->subject('New Job Application Received')
                        ->attach(public_path($request_job->resume));
            });
        }

        return redirect()->back()->with('message', 'Application has been Submitted Successfully');

    }


    public function teacher_create_new_post(Request $request)
    {

        // dd($request->all());

        $post_save = new Post($request->all());

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $folderName = '/uploads/posts/';
            $destinationPath = public_path() . $folderName;
            // dd($destinationPath);
            $file->move($destinationPath, $fileName);

            $full_path = $folderName . $fileName;

            $post_save->image = $full_path;
        }

        $post_save->save();


        //        $get_last_post = DB::table('posts')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $get_last_post = DB::table('posts')->where('user_id', Auth::user()->id)->where('role_id', Auth::user()->role)->orderBy('id', 'desc')->first();
        $post_user_profile = User::find($get_last_post->user_id)->image;
        $dayago = Carbon::parse($post_user_profile->created_at)->diffForHumans();


        return response()->json(['message' => 'New Post has been Created Successfully', 'status' => true, 'get_last_post' => $get_last_post, 'post_user_profile' => $post_user_profile, 'dayago' => $dayago]);
        // return back();

    }

    public function share_post(Request $request)
    {
        // return $request;
        $request->validate([
            'post_id' => 'required',
            'note' => 'nullable|string',
        ]);

        $postId = $request->input('post_id');
        $sharepost = $request->input('share_post');
        $userId = Auth::id();
        $note = $request->input('note');

        if ($sharepost != null) {
            $alreadyShared = DB::table('posts')
                ->where('share_post', $sharepost)
                ->where('user_id', $userId)
                ->first();

            if ($alreadyShared) {
                return response()->json(['message' => 'You have already shared this post.', 'status' => false]);
            }
        }



        $sharedPostId = DB::table('posts')->insertGetId([
            'share_post' => $postId,
            'user_id' => $userId,
            'post' => $note,
            'role_id' => Auth::user()->role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('post_shares')->insert([
            'post_id' => $postId,
            'shared_by' => $userId,
            'note' => $note,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Post shared successfully', 'status' => true, 'redirectUrl' => route('add_post')]);
    }


    public function save_comment(Request $request)
    {

        //   dd($request->all());

        $post_comments = new Comment($request->all());

        $post_comments->save();


        $get_last_comments = DB::table('comments')->where('post_id', $request->post_id)->orderBy('id', 'desc')->first();
        $dayago2 = Carbon::parse($get_last_comments->created_at)->diffForHumans();

        return response()->json(['message' => 'New Post has been Created Successfully', 'status' => true, 'get_last_comments' => $get_last_comments, 'dayago2' => $dayago2]);
        // return back();

    }


    public function get_last_post()
    {
        $get_last_post = DB::table('posts')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        //      $post_user_profile = User::find($get_last_post->user_id)->image;
        $post_user_profile = (Auth::user()->image != '') ? asset(Auth::user()->image) : asset('images/profilemain1.png');
        $dayago = Carbon::parse($post_user_profile->created_at)->diffForHumans();
        // dd($post_user_profile);


        return response()->json(['get_last_post' => $get_last_post, 'p_u_profile' => $post_user_profile, 'dayago' => $dayago, 'status' => true]);


    }


    public function like_post(Request $request)
    {

        $postId = $request->input('post_id');
        $userid = $request->input('user_id');

        $post_like = new Like($request->all());


        $post_like->save();

        DB::table('pined_posts')->insert([
            'post_id' => $postId,
            'user_id' => $userid,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return response()->json(['message' => 'Post Liked', 'status' => true]);
        // return back();

    }


    public function unlike_post(Request $request)
    {

        // dd($request->all());
        $get_like_id = Like::where(['user_id' => $request->user_id, 'post_id' => $request->post_id])->delete();
        // dd($get_like_id);

        return response()->json(['message' => 'Post Unliked', 'status' => true]);
        // return back();

    }


    public function delete_post()
    {

        // dd($request->all());
        // dd($_POST);
        $ID = $_POST['post_id'];
        Post::destroy($ID);
        return response()->json(['message' => 'Post has been Deleted Successfully', 'status' => true]);

    }


    public function add_pined_post()
    {

        // dd($request->all());
        //  dd($_POST);
        $post_id = $_POST['pined_post_id'];
        $user_id = Auth::user()->id;

        $add_pin_post = new Pined_post();
        $add_pin_post->post_id = $post_id;
        $add_pin_post->user_id = $user_id;
        $add_pin_post->save();

        return response()->json(['message' => 'Post has been Pined Successfully', 'status' => true]);

    }


    public function delete_pined_post()
    {

        // dd($request->all());
        //  dd($_POST);
        $post_id = $_POST['pined_post_id'];
        $user_id = Auth::user()->id;

        DB::table('pined_posts')->where('post_id', $post_id)->where('user_id', $user_id)->delete();

        return response()->json(['message' => 'Post has been Unpined Successfully', 'status' => true]);

    }


    public function update_profile()
    {

        if (Auth::user()->role != "3") {
            return redirect("/");
        }


        return view('update_profile');

    }


    // ============================================ Provider Dashboard Section ======================================== //

    public function provider_dashboard()
    {

        if (Auth::user()->role != "4") {
            return redirect("/");
        }

        $page = DB::table('pages')->where('id', 7)->first();
        $section = DB::table('section')->where('page_id', 7)->get();

        return view('provider_dashboard', compact('page', 'section'));

    }


    public function add_job()
    {

        if (Auth::user()->role != "4") {
            return redirect("/");
        }


        return view('add_job');

    }


    public function view_job()
    {

        if (Auth::user()->role != "4") {
            return redirect("/");
        }


        $perPage = 10;
        $job_post = Job_post::paginate($perPage);

        //dd($job_post);

        return view('view_job', compact('job_post'));

    }

    public function getJobDetails(Request $request)
    {
        $job = Job_post::find($request->id);
        return view('job_details', compact('job'))->render();
    }


    public function edit_job($id = '')
    {

        if (Auth::user()->role != "4") {
            return redirect("/");
        }

        $get_post_byid = Job_post::where('id', $id)->first();

        //dd($get_post_byid);

        return view('edit_job', compact('get_post_byid'));

    }


    public function delete_job($id = '')
    {

        Job_post::destroy($id);
        return redirect()->back()->with('message', 'Job_post deleted!');

    }


    public function save_add_job(Request $request)
    {

        // dd($request->all());

        $job_post = new Job_post($request->all());

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            //make sure yo have image folder inside your public
            $job_post_path = 'uploads/job_posts/';
            $fileName = $file->getClientOriginalName();
            $profileImage = date("Ymd") . $fileName . "." . $file->getClientOriginalExtension();

            Image::make($file)->save(public_path($job_post_path) . DIRECTORY_SEPARATOR . $profileImage);

            $job_post->image = $job_post_path . $profileImage;
        }

        $job_post->save();

        return redirect()->back()->with('message', 'Job_post added!');

    }


    public function update_add_job(Request $request)
    {

        $requestData = $request->all();

        $update_job_post = Job_post::findOrFail($request->id);
        $update_job_post->update($requestData);
        return redirect()->back()->with('message', 'Job_post updated!');

    }


    public function job_request()
    {

        if (Auth::user()->role != "4") {
            return redirect("/");
        }

        $provider_id = Auth::user()->id;
        $perPage = 25;
        $request_job = Request_job::Where('job_creator_id', $provider_id)->paginate($perPage);
        // dd($request_job);
        return view('request_job', compact('request_job'));

    }


    public function view_job_request($id = '')
    {

        if (Auth::user()->role != "4") {
            return redirect("/");
        }

        $provider_id = Auth::user()->id;
        $perPage = 25;
        $view_request_job = Request_job::Where('id', $id)->first();
        // dd($view_request_job);
        return view('view_job_request', compact('view_request_job'));

    }


    public function delete_job_request($id = '')
    {

        Request_job::destroy($id);
        return redirect()->back()->with('message', 'Request Deleted Successfully');

    }


    public function update_provider_profile()
    {

        if (Auth::user()->role != "4") {
            return redirect("/");
        }
        return view('update_provider_profile');

    }


    public function careerSubmit(Request $request)
    {


        inquiry::create($request->all());


        return response()->json(['message' => 'Thank you for contacting us. We will get back to you asap', 'status' => true]);
        return back();
    }

    public function newsletterSubmit(Request $request)
    {

        $is_email = newsletter::where('newsletter_email', $request->newsletter_email)->count();
        if ($is_email == 0) {
            $inquiry = new newsletter;
            $inquiry->newsletter_email = $request->newsletter_email;
            $inquiry->save();
            return response()->json(['message' => 'Thank you for contacting us. We will get back to you asap', 'status' => true]);

        } else {
            return response()->json(['message' => 'Email already exists', 'status' => false]);
        }

    }

    public function updateContent(Request $request)
    {
        $id = $request->input('id');
        $keyword = $request->input('keyword');
        $htmlContent = $request->input('htmlContent');
        if ($keyword == 'page') {
            $update = DB::table('pages')
                ->where('id', $id)
                ->update(array('content' => $htmlContent));

            if ($update) {
                return response()->json(['message' => 'Content Updated Successfully', 'status' => true]);
            } else {
                return response()->json(['message' => 'Error Occurred', 'status' => false]);
            }
        } else if ($keyword == 'section') {
            $update = DB::table('section')
                ->where('id', $id)
                ->update(array('value' => $htmlContent));
            if ($update) {
                return response()->json(['message' => 'Content Updated Successfully', 'status' => true]);
            } else {
                return response()->json(['message' => 'Error Occurred', 'status' => false]);
            }
        }
    }

}
