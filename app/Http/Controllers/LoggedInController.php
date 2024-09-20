<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\inquiry;
use App\newsletter;
use App\Program;
use App\imagetable;
use App\Banner;
use DB;
use View;
use File;
use App\orders_products;
use App\orders;
use Auth;
use Session;
use App\Http\Traits\HelperTrait;
use App\User;
use Image;
use App\Childcare;


class LoggedInController extends Controller
{
	use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 // use Helper;

    public function __construct()
    {

		// $this->middleware('guest');
        $this->middleware('auth');
        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();

		$favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first();

        View()->share('logo',$logo);
		View()->share('favicon',$favicon);
        //View()->share('config',$config);

    }


	public function orders()
    {

		if(Auth::user()->role != "2"){

			return redirect("/");

		}

		$orders = orders::where('orders.user_id', Auth::user()->id)
				->orderBy('orders.id', 'desc')
				->get();
		return view('account.orders',['ORDERS'=>$orders]);

	}


	public function account()
    {


		if(Auth::user()->role != "2"){

			return redirect("/");

		}

		$orders = orders::where('orders.user_id', Auth::user()->id)
				->orderBy('orders.id', 'desc')
				->get();
		return view('account.index',['ORDERS'=>$orders]);

	}


	public function finddaycare()
    {

        $check_is_paid = DB::table('users')->where('id',Auth::user()->id)->where('role','2')->where('status','1')->first();


        $search = "";

        if(isset($_GET['search']))
        {
            $search = $_GET['search'];
            $childCare =  Childcare::where('city','LIKE',"%{$search}%")->orWhere('state','LIKE',"%{$search}%")->orWhere('name','LIKE',"%{$search}%")->orWhere('county','LIKE',"%{$search}%")->orWhere('program_type','LIKE',"%{$search}%")->where('status','1')->groupBy('name')->get();

        }

	    return view('account.finddaycare',['amount'=>$check_is_paid , 'search'=>$search , 'childCare'=>$childCare]);

	}




	public function my_claimed_daycare()
    {

        $climedchildCare = DB::table('childcares')->where('claimed_by_id',Auth::user()->id)->where('status','1')->get();


	    return view('account.my_claimed_daycare', compact('climedchildCare'));

	}






	public function update_daycare_center(Request $request)
    {


        $requestData = $request->all();
        $id = $request->id;

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


        $requestData['claim_status'] = "2";
        $requestData['claimed_by_id'] = auth()->user()->id;


        $childcareupdate = Childcare::findOrFail($id);
        $childcareupdate->update($requestData);

        return redirect()->back()->with('message', 'You are successfully claimed daycare center');

    }



    public function orderSearch(Request $request){
        $user = User::where('id',Auth::user()->id)->first();
        $insertArr = array();
        $insertArr['amount'] = $request->price;
        $insertArr['payment_method'] = $request->payment_method;
        $insertArr['card_token'] = $request->stripeToken;
        $insertArr['transaction_id'] = $request->payment_id;
        $insertArr['payer_id'] = $request->payer_id;
        $insertArr['paypal_token'] = $request->_token;
        $insertArr['payment_status'] = $request->payment_status;

        DB::table('users')
		->where('id', Auth::user()->id)
		->update(
					$insertArr
				);
		Session::flash('message', 'Your Payment Successfull');
		Session::flash('alert-class', 'alert-success');
		return back();
    }

	public function update_profile(Request $request) {

		$user = DB::table('profiles')->where('id', Auth::user()->id)->first();

		$validateArr = array();
		$messageArr = array();
		$insertArr = array();
		$validateArr = [

			'uname' => 'required',
			'email' => array(),

		 ];

		 if($user->email != $_POST['email']) {
			$validateArr['email'] = 'required|unique:users,email,NULL,id';
		 }

		if(trim($_POST['password']) != "") {

			$validateArr['password'] = 'required|min:6|confirmed';
            $validateArr['password_confirmation'] = 'required|min:6';
		}

		$this->validate($request,$validateArr,$messageArr);

		$insertArr['name'] = $_POST['uname'];
		$insertArr['email'] = $_POST['email'];

		if(trim($_POST['password']) != "") {
				$insertArr['password'] = Hash::make($_POST['password']);
		}

		DB::table('users')
		->where('id', Auth::user()->id)
		->update(
					$insertArr
				);


		Session::flash('message', 'Your Profile Settings has been changed');
		Session::flash('alert-class', 'alert-success');
		return back();

	}


	public function uploadPicture(Request $request) {

		$user = DB::table('profiles')->where('id', Auth::user()->id)->first();

        if ($file = $request->file('pic')) {
            $extension = $file->extension()?: 'jpg|png';
            $destinationPath = public_path() . '/storage/uploads/users/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            //delete old pic if exists
            if (File::exists($destinationPath . $user->pic)) {
                File::delete($destinationPath . $user->pic);
            }
            //save new file path into db
            $profile->pic = $safeName;
        }

			$insertArr['pic'] = $safeName;

			DB::table('profiles')
			->where('id', Auth::user()->id)
			->update(
						$insertArr
					);

		Session::flash('message', 'Your Profile has been changed');
		Session::flash('alert-class', 'alert-success');
		return back();

	}

    public function updateAccount(Request $request) {

		$user = DB::table('users')->where('id', Auth::user()->id)->first();

		$insertArr['name'] = $_POST['name'];
		$insertArr['lname'] = $_POST['lname'];
		$insertArr['email'] = $_POST['email'];


		$password = $_POST['password'];
		$confirmpass = $_POST['password_confirmation'];
		  if($password == $confirmpass ){
		if(trim($_POST['password']) != "") {
		  $insertArr['password'] = Hash::make($_POST['password']);
		}
		DB::table('users')
		->where('id', Auth::user()->id)
		->update(
		   $insertArr
		  );

		Session::flash('message', 'Your password settings has been changed');
		Session::flash('alert-class', 'alert-success');
		return back();
		  }
		  else{

		   Session::flash('flash_message', 'Password do not match');
		Session::flash('alert-class', 'alert-danger');
		return back();

		  }

	   }


	public function accountDetail()
    {

		if(Auth::user()->role != "2"){

			return redirect("/");

		}


		$orders = orders::where('orders.user_id', Auth::user()->id)
						->orderBy('orders.id', 'desc')
						->get();

		return view('account.account',['ORDERS'=>$orders]);

	}



	public function invoice($id)
    {

		if(Auth::user()->role != "2"){

			return redirect("/");

		}


		$order_id = $id;
		$order = orders::where('id',$order_id)->first();
		$order_products = orders_products::where('orders_id',$order_id)->get();

		return view('account.invoice')->with('title','Invoice #'.$order_id)->with(compact('order','order_products'))->with('order_id',$order_id);;
	}





	public function update_profile2(Request $request) {



		$requestData = $request->all();
// 		dd($requestData);

		$users = User::where('id', $request->id)->first();
		$image_path = public_path($users->image);
		$banner_image_path = public_path($users->banner_image);


		if ($request->hasFile('image')) {


            if(File::exists($image_path)) {
                File::delete($image_path);
            }

			if(File::exists($banner_image_path)) {
                File::delete($banner_image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/users/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


            $requestData['image'] = 'uploads/users/'.$fileNameToStore;

		}



		if ($request->hasFile('banner_image')) {


			if(File::exists($banner_image_path)) {
                File::delete($banner_image_path);
            }

            $file = $request->file('banner_image');
            $fileNameExt = $request->file('banner_image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('banner_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/users/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


            $requestData['banner_image'] = 'uploads/users/'.$fileNameToStore;

		}

		if($request->password != ''){

			$requestData['password'] = Hash::make($request->password);

		}

		$users = User::findOrFail($request->id);
		$users->update($requestData);


		Session::flash('message', 'Teacher Profile has been Updated Successfully');
		Session::flash('alert-class', 'alert-success');
	   	return back();

	}



	public function update_prov_profile2(Request $request) {
    //    dd($request->all());



		$requestData = $request->all();
        // dd($requestData);

		$users = User::where('id', $request->id)->first();
		$image_path = public_path($users->image);
		$banner_image_path = public_path($users->banner_image);


		if ($request->hasFile('image')) {


            if(File::exists($image_path)) {
                File::delete($image_path);
            }

			if(File::exists($banner_image_path)) {
                File::delete($banner_image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/users/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


            $requestData['image'] = 'uploads/users/'.$fileNameToStore;

		}



		if ($request->hasFile('banner_image')) {


			if(File::exists($banner_image_path)) {
                File::delete($banner_image_path);
            }

            $file = $request->file('banner_image');
            $fileNameExt = $request->file('banner_image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('banner_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/users/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);


            $requestData['banner_image'] = 'uploads/users/'.$fileNameToStore;

		}

        $requestData['password'] = Hash::make($request->password);

		$users = User::findOrFail($request->id);

        $requestData['hours_of_operation'] = implode(',', $requestData['hours_of_operation']);
        $requestData['age_accepted'] = implode(',', $requestData['age_accepted']);
        $requestData['types_of_care_provided'] = implode(',', $requestData['types_of_care_provided']);
		$users->update($requestData);


		Session::flash('message', 'Provider Profile has been Updated Successfully');
		Session::flash('alert-class', 'alert-success');
	   	return back();

	}




	public function friends()
    {
		return view('account.friends');

	}

	public function upload()
    {
		return view('account.upload');

	}

	public function password()
    {
		return view('account.password');

	}

}

