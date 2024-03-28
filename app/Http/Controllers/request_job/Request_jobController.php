<?php

namespace App\Http\Controllers\request_job;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Request_job;
use Illuminate\Http\Request;
use Image;
use File;

class Request_jobController extends Controller
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
        $model = str_slug('request_job','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $request_job = Request_job::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orWhere('job_title', 'LIKE', "%$keyword%")
                ->orWhere('job_type', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('expected_salary', 'LIKE', "%$keyword%")
                ->orWhere('education', 'LIKE', "%$keyword%")
                ->orWhere('skills', 'LIKE', "%$keyword%")
                ->orWhere('apply_date', 'LIKE', "%$keyword%")
                ->orWhere('about', 'LIKE', "%$keyword%")
                ->orWhere('upload_resume', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $request_job = Request_job::paginate($perPage);
            }

            return view('request_job.request_job.index', compact('request_job'));
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
        $model = str_slug('request_job','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('request_job.request_job.create');
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
        $model = str_slug('request_job','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $request_job = new Request_job($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $request_job_path = 'uploads/resume/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($request_job_path) . DIRECTORY_SEPARATOR. $profileImage);

                $request_job->image = $request_job_path.$profileImage;
            }
            
            $request_job->save();
            return redirect()->back()->with('message', 'Request_job added!');
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
        $model = str_slug('request_job','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $request_job = Request_job::findOrFail($id);
            return view('request_job.request_job.show', compact('request_job'));
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
        $model = str_slug('request_job','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $request_job = Request_job::findOrFail($id);
            return view('request_job.request_job.edit', compact('request_job'));
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
        $model = str_slug('request_job','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $request_job = Request_job::where('id', $id)->first();
            $image_path = public_path($request_job->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/resume/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/resume/'.$fileNameToStore;               
        }


            $request_job = Request_job::findOrFail($id);
            $request_job->update($requestData);
            return redirect()->back()->with('message', 'Request_job updated!');
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
        $model = str_slug('request_job','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Request_job::destroy($id);
            return redirect()->back()->with('message', 'Request_job deleted!');
        }
        return response(view('403'), 403);

    }
}
