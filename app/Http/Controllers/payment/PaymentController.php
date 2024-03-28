<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Payment;
use Illuminate\Http\Request;
use Image;
use File;
use App\User;

class PaymentController extends Controller
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
        $model = str_slug('payment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $payment = User::where('amount','>',0)->where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $payment = User::where('amount','>',0)->paginate($perPage);
            }

            return view('payment.payment.index', compact('payment'));
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
        $model = str_slug('payment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('payment.payment.create');
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
        $model = str_slug('payment','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $payment = new Payment($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $payment_path = 'uploads/payments/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($payment_path) . DIRECTORY_SEPARATOR. $profileImage);

                $payment->image = $payment_path.$profileImage;
            }
            
            $payment->save();
            return redirect()->back()->with('message', 'Payment added!');
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
        $model = str_slug('payment','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $payment = Payment::findOrFail($id);
            return view('payment.payment.show', compact('payment'));
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
        $model = str_slug('payment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $payment = Payment::findOrFail($id);
            return view('payment.payment.edit', compact('payment'));
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
        $model = str_slug('payment','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $payment = Payment::where('id', $id)->first();
            $image_path = public_path($payment->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/payments/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/payments/'.$fileNameToStore;               
        }


            $payment = Payment::findOrFail($id);
            $payment->update($requestData);
            return redirect()->back()->with('message', 'Payment updated!');
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
        $model = str_slug('payment','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Payment::destroy($id);
            return redirect()->back()->with('message', 'Payment deleted!');
        }
        return response(view('403'), 403);

    }
}
