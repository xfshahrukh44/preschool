<?php

namespace App\Http\Controllers;

use File;
use View;
use App\Childcare;
use App\Models\Post;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('provider');
    }


    public function dashboard()
    {
        $page = DB::table('pages')->where('id', 7)->first();
        $section = DB::table('section')->where('page_id', 7)->get();

        $get_last_post = Post::where('role_id', Auth::user()->role)->orderBy('id', 'desc')
            ->when(request()->has('search'), function ($q) {
                return $q->where('post', 'LIKE', '%' . request()->get('search') . '%');
            })
            ->get();

        return view('provider_dashboard', compact('page', 'section', 'get_last_post'));
    }

    public function findDaycare()
    {

        $check_is_paid = DB::table('users')->where('id', Auth::user()->id)->where('role', '2')->where('status', '1')->first();

        $search = $_GET['search'] ?? "";
        $childCare = Childcare::where('status', '1')->groupBy('name')->when(isset($_GET['search']), function ($q) use ($search) {
            return $q->where('city', 'LIKE', "%{$search}%")
                ->orWhere('state', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('county', 'LIKE', "%{$search}%")
                ->orWhere('program_type', 'LIKE', "%{$search}%");
        })
            ->when(!isset($_GET['search']), function ($q) {
                return $q->where('state', 'LIKE', "%akjdhasjkdja hsjdahd suia ghaui hdsajd siadh aisdyasuidhasijdsa%");
            })
            ->paginate(25);

        //        if(isset($_GET['search']))
//        {
//            $childCare =  Childcare::where('city','LIKE',"%{$search}%")->orWhere('state','LIKE',"%{$search}%")->orWhere('name','LIKE',"%{$search}%")->orWhere('county','LIKE',"%{$search}%")->orWhere('program_type','LIKE',"%{$search}%")->where('status','1')->groupBy('name')->paginate(25);
//            $search = $_GET['search'];
//
//        }

        //        return view('account.finddaycare',['amount'=>$check_is_paid , 'search'=>$search , 'childCare'=>$childCare]);
        return view('daycares', ['amount' => $check_is_paid, 'search' => $search, 'childCare' => $childCare]);
    }

    public function updateDaycareCenter(Request $request)
    {
        $requestData = $request->except(['timings', 'services', 'meal_offered)']);
        $id = $request->id;
        // dd($requestData);
        if ($request->hasFile('feature_image')) {
            $file = $request->file('feature_image');
            $fileNameExt = $request->file('feature_image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('feature_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $pathToStore = public_path('uploads/feature_images/');
            // Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR . $fileNameToStore);
            $file->move($pathToStore, $fileNameToStore);
            $requestData['feature_image'] = 'uploads/feature_images/' . $fileNameToStore;
        }

        if ($request->hasFile('other_image_one')) {
            $file = $request->file('other_image_one');
            $fileNameExt = $request->file('other_image_one')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('other_image_one')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $pathToStore = public_path('uploads/other_image_one/');
            $file->move($pathToStore, $fileNameToStore);
            // Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR . $fileNameToStore);
            $requestData['other_image_one'] = 'uploads/other_image_one/' . $fileNameToStore;
        }


        if ($request->hasFile('other_image_two')) {


            $file = $request->file('other_image_two');
            $fileNameExt = $request->file('other_image_two')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('other_image_two')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $pathToStore = public_path('uploads/other_image_two/');
            $file->move($pathToStore, $fileNameToStore);
            // \Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR . $fileNameToStore);


            $requestData['other_image_two'] = 'uploads/other_image_two/' . $fileNameToStore;

        }

        if ($request->input('age_accepted')) {
            $ageAccepted = implode(',', $request->input('age_accepted'));
            $requestData['age_accepted'] = $ageAccepted;
            // dd($ageAccepted);
        }

        if ($request->input('food_served')) {
            $food_served = implode(',', $request->input('food_served'));
            $requestData['food_served'] = $food_served;
        }

        if ($request->input('language')) {
            $language = $request->input('language');
            $requestData['language'] = $language;
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
                $services[] = $key;
            }
            $childcareupdate->services = $services;
            $childcareupdate->save();
        }

        if ($request->has('meal_offered')) {
            $meal_offered = [];
            foreach ($request->get('meal_offered') as $key => $value) {
                $meal_offered[] = $key;
            }
            $childcareupdate->meal_offered = $meal_offered;
            $childcareupdate->save();
        }


        if ($request->has('tansportation')) {
            $childcareupdate->tansportation = $request->get('tansportation');
            $childcareupdate->save();
        }

        if ($request->has('family_discount_offered')) {
            $childcareupdate->family_discount_offered = $request->get('family_discount_offered');
            $childcareupdate->save();
        }

        if ($request->has('family_discount')) {
            $childcareupdate->family_discount = $request->get('family_discount');
            $childcareupdate->save();
        }

        if ($request->has('military_child_care_discount')) {
            $childcareupdate->military_child_care_discount = $request->get('military_child_care_discount');
            $childcareupdate->save();
        }

        if ($request->has('military_child_discount')) {
            $childcareupdate->military_child_discount = $request->get('military_child_discount');
            $childcareupdate->save();
        }

        if ($request->has('application_registration')) {
            $childcareupdate->application_registration = $request->get('application_registration');
            $childcareupdate->save();
        }

        if ($request->has('diapers')) {
            $childcareupdate->diapers = $request->get('diapers');
            $childcareupdate->save();
        }

        if ($request->has('early_drop_off')) {
            $childcareupdate->early_drop_off = $request->get('early_drop_off');
            $childcareupdate->save();
        }

        if ($request->has('extended_stay')) {
            $childcareupdate->extended_stay = $request->get('extended_stay');
            $childcareupdate->save();
        }

        if ($request->has('late_payment')) {
            $childcareupdate->late_payment = $request->get('late_payment');
            $childcareupdate->save();
        }

        if ($request->has('waitingList_registration')) {
            $childcareupdate->waitingList_registration = $request->get('waitingList_registration');
            $childcareupdate->save();
        }

        if ($request->has('late_pick_up')) {
            $childcareupdate->late_pick_up = $request->get('late_pick_up');
            $childcareupdate->save();
        }

        if ($request->has('meals_snacks')) {
            $childcareupdate->meals_snacks = $request->get('meals_snacks');
            $childcareupdate->save();
        }

        if ($request->has('returned_check')) {
            $childcareupdate->returned_check = $request->get('returned_check');
            $childcareupdate->save();
        }

        if ($request->has('credit_card_declined')) {
            $childcareupdate->credit_card_declined = $request->get('credit_card_declined');
            $childcareupdate->save();
        }

        if ($request->has('supplies_materials')) {
            $childcareupdate->supplies_materials = $request->get('supplies_materials');
            $childcareupdate->save();
        }

        if ($request->has('other')) {
            $childcareupdate->other = $request->get('other');
            $childcareupdate->save();
        }


        return redirect()->back()->with('message', 'You have successfully claimed daycare center.');
    }

    public function claimedCenters(Request $request)
    {
        // dd(DB::table('childcares')->where('claimed_by_id', Auth::user()->id)->where('status', '1')->get());
        $claimed_centers = DB::table('childcares')->where('claimed_by_id', Auth::user()->id)->where('status', '1')->get();

        //        return view('account.my_claimed_daycare', compact('claimed_centers'));
        return view('claimed-centers', compact('claimed_centers'));
    }
}
