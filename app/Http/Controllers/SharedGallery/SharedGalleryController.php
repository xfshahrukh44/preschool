<?php

namespace App\Http\Controllers\SharedGallery;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\SharedGallery;
use Illuminate\Http\Request;
use Image;
use File;

class SharedGalleryController extends Controller
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

        $model = str_slug('sharedgallery','-');
        // if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $sharedgallery = SharedGallery::where('name', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('tagline', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $sharedgallery = SharedGallery::paginate($perPage);
            }
            
            // dd("this");
            return view('admin/shared-gallery.shared-gallery.index', compact('sharedgallery'));
        // }
        // return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('sharedgallery','-');
        
        return view('admin/shared-gallery.shared-gallery.create');
 

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
        $model = str_slug('sharedgallery','-');
       
            $this->validate($request, [
			'name' => 'required',
			'user_id' => 'required',
			'tagline' => 'required'
		]);

            $sharedgallery = new SharedGallery($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                //make sure yo have image folder inside your public
                $sharedgallery_path = 'uploads/sharedgallerys/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($sharedgallery_path) . DIRECTORY_SEPARATOR. $profileImage);

                $sharedgallery->image = $sharedgallery_path.$profileImage;
            }

            $sharedgallery->save();
            return redirect()->back()->with('message', 'SharedGallery added!');
        
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
        $model = str_slug('sharedgallery','-');
        
        $sharedgallery = SharedGallery::findOrFail($id);
        return view('admin/shared-gallery.shared-gallery.show', compact('sharedgallery'));
        
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
        $model = str_slug('sharedgallery','-');
        
            $sharedgallery = SharedGallery::findOrFail($id);
            return view('admin/shared-gallery.shared-gallery.edit', compact('sharedgallery'));
        
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
        $model = str_slug('sharedgallery','-');
        
            $this->validate($request, [
			'name' => 'required',
			'user_id' => 'required',
			'tagline' => 'required'
		]);
            $requestData = $request->all();


        if ($request->hasFile('image')) {

            $sharedgallery = SharedGallery::where('id', $id)->first();
            $image_path = public_path($sharedgallery->image);

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/sharedgallerys/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/sharedgallerys/'.$fileNameToStore;
        }


            $sharedgallery = SharedGallery::findOrFail($id);
            $sharedgallery->update($requestData);
            return redirect()->back()->with('message', 'SharedGallery updated!');
       

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
        $model = str_slug('sharedgallery','-');
        
            SharedGallery::destroy($id);
            return redirect()->back()->with('message', 'SharedGallery deleted!');
       

    }
}
