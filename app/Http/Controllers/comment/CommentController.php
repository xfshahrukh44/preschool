<?php

namespace App\Http\Controllers\comment;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Comment;
use Illuminate\Http\Request;
use Image;
use File;

class CommentController extends Controller
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
        $model = str_slug('comment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $comment = Comment::where('comment', 'LIKE', "%$keyword%")
                ->orWhere('post_id', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('post_image', 'LIKE', "%$keyword%")
                ->orWhere('user_image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $comment = Comment::paginate($perPage);
            }

            return view('comment.comment.index', compact('comment'));
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
        $model = str_slug('comment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('comment.comment.create');
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
        $model = str_slug('comment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $comment = new Comment($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $comment_path = 'uploads/comments/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($comment_path) . DIRECTORY_SEPARATOR. $profileImage);

                $comment->image = $comment_path.$profileImage;
            }
            
            $comment->save();
            return redirect()->back()->with('message', 'Comment added!');
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
        $model = str_slug('comment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $comment = Comment::findOrFail($id);
            return view('comment.comment.show', compact('comment'));
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
        $model = str_slug('comment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $comment = Comment::findOrFail($id);
            return view('comment.comment.edit', compact('comment'));
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
        $model = str_slug('comment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $comment = Comment::where('id', $id)->first();
            $image_path = public_path($comment->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/comments/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/comments/'.$fileNameToStore;               
        }


            $comment = Comment::findOrFail($id);
            $comment->update($requestData);
            return redirect()->back()->with('message', 'Comment updated!');
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
        $model = str_slug('comment','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Comment::destroy($id);
            return redirect()->back()->with('message', 'Comment deleted!');
        }
        return response(view('403'), 403);

    }
}
