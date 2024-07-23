<?php

namespace App\Http\Controllers;

use App\Childcare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use View;
use File;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('provider');
    }

    public function dashboard ()
    {
        $page = DB::table('pages')->where('id', 7)->first();
        $section = DB::table('section')->where('page_id', 7)->get();

        return view('provider_dashboard', compact('page','section'));
    }

    public function findDaycare()
    {

        $check_is_paid = DB::table('users')->where('id',Auth::user()->id)->where('role','2')->where('status','1')->first();

        $search = $_GET['search'] ?? "";
        $childCare =  Childcare::where('status','1')->groupBy('name')->when(isset($_GET['search']), function ($q) use ($search) {
            return $q->where('city','LIKE',"%{$search}%")
                ->orWhere('state','LIKE',"%{$search}%")
                ->orWhere('name','LIKE',"%{$search}%")
                ->orWhere('county','LIKE',"%{$search}%")
                ->orWhere('program_type','LIKE',"%{$search}%");
        })
        ->when(!isset($_GET['search']), function ($q) {
            return $q->where('state','LIKE',"%akjdhasjkdja hsjdahd suia ghaui hdsajd siadh aisdyasuidhasijdsa%");
        })
        ->paginate(25);

//        if(isset($_GET['search']))
//        {
//            $childCare =  Childcare::where('city','LIKE',"%{$search}%")->orWhere('state','LIKE',"%{$search}%")->orWhere('name','LIKE',"%{$search}%")->orWhere('county','LIKE',"%{$search}%")->orWhere('program_type','LIKE',"%{$search}%")->where('status','1')->groupBy('name')->paginate(25);
//            $search = $_GET['search'];
//
//        }

//        return view('account.finddaycare',['amount'=>$check_is_paid , 'search'=>$search , 'childCare'=>$childCare]);
        return view('daycares',['amount'=>$check_is_paid , 'search'=>$search , 'childCare'=>$childCare]);
    }

    public function updateDaycareCenter(Request $request)
    {
//        $request->validate([
//            'services' => 'required|array',
//            'services.*' => 'boolean'
//        ]);
        $requestData = $request->except(['timings', 'services']);
        $id = $request->id;
//        $childcareupdate = Childcare::findOrFail($id);
//
//        if ($childcareupdate->zip != $request->zip) {
//            return redirect()->back()->with('message', 'Verification failed');
//        }

        if ($request->hasFile('feature_image')) {


            $file = $request->file('feature_image');
            $fileNameExt = $request->file('feature_image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('feature_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/feature_images/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


            $requestData['feature_image'] = 'uploads/feature_images/'.$fileNameToStore;

        }


        if ($request->hasFile('other_image_one')) {


            $file = $request->file('other_image_one');
            $fileNameExt = $request->file('other_image_one')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('other_image_one')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/other_image_one/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


            $requestData['other_image_one'] = 'uploads/other_image_one/'.$fileNameToStore;

        }


        if ($request->hasFile('other_image_two')) {


            $file = $request->file('other_image_two');
            $fileNameExt = $request->file('other_image_two')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('other_image_two')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/other_image_two/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


            $requestData['other_image_two'] = 'uploads/other_image_two/'.$fileNameToStore;

        }

        if($request->input('age_accepted')){
            $ageAccepted = implode(',', $request->input('age_accepted'));
            $requestData['age_accepted'] = $ageAccepted;
        }


        $requestData['claim_status'] = "2";
        $requestData['claimed_by_id'] = auth()->user()->id;


        $childcareupdate = Childcare::findOrFail($id);
        $childcareupdate->update($requestData);

        if ($request->has('timings')) {
            $childcareupdate->timings = $request->get('timings');
            $childcareupdate->save();
        }

        if ($request->has('services')) {
            $services = [];
            foreach ($request->get('services') as $key => $value) {
                $services []= $key;
            }
            $childcareupdate->services = $services;
            $childcareupdate->save();
        }

        return redirect()->back()->with('message', 'You have successfully claimed daycare center.');
    }

    public function claimedCenters(Request $request)
    {
        $claimed_centers = DB::table('childcares')->where('claimed_by_id',Auth::user()->id)->where('status','1')->get();

//        return view('account.my_claimed_daycare', compact('claimed_centers'));
        return view('claimed-centers', compact('claimed_centers'));
    }
}
