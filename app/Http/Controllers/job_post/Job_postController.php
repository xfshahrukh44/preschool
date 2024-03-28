<?php

namespace App\Http\Controllers\job_post;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Job_post;
use Illuminate\Http\Request;
use Image;
use File;

class Job_postController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('job_post','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $job_post = Job_post::where('job_title', 'LIKE', "%$keyword%")
                ->orWhere('job_description', 'LIKE', "%$keyword%")
                ->orWhere('company_name', 'LIKE', "%$keyword%")
                ->orWhere('company_description', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('job_type', 'LIKE', "%$keyword%")
                ->orWhere('salary_range', 'LIKE', "%$keyword%")
                ->orWhere('required_education', 'LIKE', "%$keyword%")
                ->orWhere('skills', 'LIKE', "%$keyword%")
                ->orWhere('instruction', 'LIKE', "%$keyword%")
                ->orWhere('post_date', 'LIKE', "%$keyword%")
                ->orWhere('due_date', 'LIKE', "%$keyword%")
                ->orWhere('creator_name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $job_post = Job_post::paginate($perPage);
            }

            return view('job_post.job_post.index', compact('job_post'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('job_post','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('job_post.job_post.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('job_post','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $job_post = new Job_post($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $job_post_path = 'uploads/job_posts/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($job_post_path) . DIRECTORY_SEPARATOR. $profileImage);

                $job_post->image = $job_post_path.$profileImage;
            }
            
            $job_post->save();
            return redirect()->back()->with('message', 'Job_post added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('job_post','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $job_post = Job_post::findOrFail($id);
            return view('job_post.job_post.show', compact('job_post'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('job_post','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $job_post = Job_post::findOrFail($id);
            return view('job_post.job_post.edit', compact('job_post'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('job_post','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $job_post = Job_post::where('id', $id)->first();
            $image_path = public_path($job_post->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/job_posts/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/job_posts/'.$fileNameToStore;               
        }


            $job_post = Job_post::findOrFail($id);
            $job_post->update($requestData);
            return redirect()->back()->with('message', 'Job_post updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('job_post','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Job_post::destroy($id);
            return redirect()->back()->with('message', 'Job_post deleted!');
        }
        return response(view('403'), 403);

    }
}
