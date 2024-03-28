<?php

namespace App\Http\Controllers\pined_post;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pined_post;
use Illuminate\Http\Request;
use Image;
use File;

class Pined_postController extends Controller
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
        $model = str_slug('pined_post','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $pined_post = Pined_post::where('post_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $pined_post = Pined_post::paginate($perPage);
            }

            return view('pined_post.pined_post.index', compact('pined_post'));
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
        $model = str_slug('pined_post','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('pined_post.pined_post.create');
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
        $model = str_slug('pined_post','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $pined_post = new Pined_post($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $pined_post_path = 'uploads/pined_posts/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($pined_post_path) . DIRECTORY_SEPARATOR. $profileImage);

                $pined_post->image = $pined_post_path.$profileImage;
            }
            
            $pined_post->save();
            return redirect()->back()->with('message', 'Pined_post added!');
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
        $model = str_slug('pined_post','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $pined_post = Pined_post::findOrFail($id);
            return view('pined_post.pined_post.show', compact('pined_post'));
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
        $model = str_slug('pined_post','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $pined_post = Pined_post::findOrFail($id);
            return view('pined_post.pined_post.edit', compact('pined_post'));
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
        $model = str_slug('pined_post','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $pined_post = Pined_post::where('id', $id)->first();
            $image_path = public_path($pined_post->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/pined_posts/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/pined_posts/'.$fileNameToStore;               
        }


            $pined_post = Pined_post::findOrFail($id);
            $pined_post->update($requestData);
            return redirect()->back()->with('message', 'Pined_post updated!');
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
        $model = str_slug('pined_post','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Pined_post::destroy($id);
            return redirect()->back()->with('message', 'Pined_post deleted!');
        }
        return response(view('403'), 403);

    }
}
