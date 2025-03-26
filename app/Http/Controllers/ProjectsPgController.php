<?php

namespace App\Http\Controllers;

use App\Project;
use App\SavedProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProjectsPgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Project = Project::when(request()->has('search'), function ($q) {
            return $q->where('title', 'LIKE', '%'.request()->get('search').'%')
                ->orWhere('description', 'LIKE', '%'.request()->get('search').'%');
        })->paginate(10);

        return view('projects.index', compact('Project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'title' => "required",
            'description' => "required",
            // 'image' => 'required|image',
            'photos' => 'required',
        ]);

        $project = new Project();
        $project->user_id = auth()->id();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->save();

        // dd($request->all());


        if (!is_null(request('photos'))) {

            $photos = request()->file('photos');
            foreach ($photos as $photo) {
                $destinationPath = 'uploads/products/';

                $photoName = uniqid('main_') . '.' . $photo->getClientOriginalExtension();
                $photo->move($destinationPath, $photoName);
                $photoPath = $destinationPath . $photoName;

                DB::table('project_images')->insert([

                    'project_id' => $project->id,
                    'name' => $photo->getClientOriginalName(),
                    'path' => $photoPath
                ]);

            }

        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Project = Project::find($id);
        return view('projects.show')->with('Project', $Project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Project = Project::find($id);
        return view('projects.edit')->with('Project', $Project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Project = Project::find($id);

        $request->validate([
            'title' => "required",
            'description' => "required",
            'photos' => 'required',
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Project = Project::find($id);

        if ($Project) {

            foreach ($Project->images as $item) {

                if (!is_null($item->path)) {

                    $imagepath = 'uploads/products/' . $item->path;

                    if (file_exists($imagepath)) {
                        if (unlink($imagepath)) {
                            session()->flash('Success', 'Product Image Deleted Successfully');
                        } else {
                            session()->flash('Error', 'Failed to Delete Product Image');
                        }
                    } else {
                        session()->flash('Error', 'Product Image Not Found');
                    }
                }

                $item->delete();
            }

            $Project->delete();

            session()->flash('Success', 'Product Deleted Successfully');
            return redirect()->route('product.index');
        }

    }

    public function save(Request $request, $id)
    {
        if ($record = SavedProject::where([
            'user_id' => auth()->id(),
            'project_id' => $id,
        ])->first()) {
            $record->delete();
            $message = 'Project removed from saved list!';
        } else {
            SavedProject::create([
                'user_id' => auth()->id(),
                'project_id' => $id,
            ]);
            $message = 'Project saved successfully!';
        }

        return redirect()->route('projects.index')->with('success', $message);
    }
}
