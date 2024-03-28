<?php

namespace App\Http\Controllers\users2;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Users2;
use Illuminate\Http\Request;
use Image;
use File;
use Hash;

class Users2Controller extends Controller
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
        $model = str_slug('users2','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $users2 = Users2::where('name', 'LIKE', "%$keyword%")
                ->orWhere('lname', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('gender', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('current_position', 'LIKE', "%$keyword%")
                ->orWhere('year_of_experience', 'LIKE', "%$keyword%")
                ->orWhere('age_worked_with', 'LIKE', "%$keyword%")
                ->orWhere('about', 'LIKE', "%$keyword%")
                ->orWhere('hour_open', 'LIKE', "%$keyword%")
                ->orWhere('age_accepted', 'LIKE', "%$keyword%")
                ->orWhere('position_accepted', 'LIKE', "%$keyword%")
                ->orWhere('about_preschool', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $users2 = Users2::Where('role','3')->paginate($perPage);
            }

            return view('users2.users2.index', compact('users2'));
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
        $model = str_slug('users2','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('users2.users2.create');
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
        $model = str_slug('users2','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $users2 = new Users2($request->all());

            $users2->password = Hash::make($request->password);


            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $users2_path = 'uploads/users2s/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($users2_path) . DIRECTORY_SEPARATOR. $profileImage);

                $users2->image = $users2_path.$profileImage;
            }
            
          
            
            $users2->save();
            return redirect()->back()->with('message', 'Users2 added!');
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
        $model = str_slug('users2','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $users2 = Users2::findOrFail($id);
            return view('users2.users2.show', compact('users2'));
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
        $model = str_slug('users2','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $users2 = Users2::findOrFail($id);
            return view('users2.users2.edit', compact('users2'));
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
        $model = str_slug('users2','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
            // $requestData['password'] = Hash::make($request->password);

        if ($request->hasFile('image')) {
            
            $users2 = Users2::where('id', $id)->first();
            $image_path = public_path($users2->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/users2s/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


             $requestData['image'] = 'uploads/users2s/'.$fileNameToStore;               
        }

        

            $users2 = Users2::findOrFail($id);
            $users2->update($requestData);
            return redirect()->back()->with('message', 'Users2 updated!');
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
        $model = str_slug('users2','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Users2::destroy($id);
            return redirect()->back()->with('message', 'Users2 deleted!');
        }
        return response(view('403'), 403);

    }
}
