<?php

namespace App\Http\Controllers\like;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Like;
use Illuminate\Http\Request;
use Image;
use File;

class LikeController extends Controller
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
        $model = str_slug('like','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $like = Like::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('post_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $like = Like::paginate($perPage);
            }

            return view('like.like.index', compact('like'));
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
        $model = str_slug('like','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('like.like.create');
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
        $model = str_slug('like','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $like = new Like($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $like_path = 'uploads/likes/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($like_path) . DIRECTORY_SEPARATOR. $profileImage);

                $like->image = $like_path.$profileImage;
            }
            
            $like->save();
            return redirect()->back()->with('message', 'Like added!');
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
        $model = str_slug('like','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $like = Like::findOrFail($id);
            return view('like.like.show', compact('like'));
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
        $model = str_slug('like','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $like = Like::findOrFail($id);
            return view('like.like.edit', compact('like'));
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
        $model = str_slug('like','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $like = Like::where('id', $id)->first();
            $image_path = public_path($like->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/likes/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/likes/'.$fileNameToStore;               
        }


            $like = Like::findOrFail($id);
            $like->update($requestData);
            return redirect()->back()->with('message', 'Like updated!');
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
        $model = str_slug('like','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Like::destroy($id);
            return redirect()->back()->with('message', 'Like deleted!');
        }
        return response(view('403'), 403);

    }
}
