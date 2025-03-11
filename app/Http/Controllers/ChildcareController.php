<?php

namespace App\Http\Controllers;

use App\Models\Childcare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChildcareController extends Controller
{
    public function index(Request $request)
    {
        $childcares = Childcare::when($request->has('search') && $request->get('search') !== '', function ($q) use ($request) {
            $keyword = $request->get('search');
            return $q->where('name', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('county', 'LIKE', "%$keyword%")
                ->orWhere('program_type', 'LIKE', "%$keyword%")
                ->orWhere('licence_sub_type', 'LIKE', "%$keyword%")
                ->orWhere('physical_address', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('zip', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('email_address', 'LIKE', "%$keyword%");
        })->paginate(10);

        return view('admin.childcare.index', compact('childcares'));
    }

    public function create(Request $request)
    {
        return view('admin.childcare.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $validator = Validator::make($data, [
           'name' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        Childcare::create($data);

        return redirect()->route('admin.childcare.index')->with('success', 'Childcare created!');
    }

    public function edit(Request $request, $id)
    {
        $childcare = Childcare::find($id);

        return view('admin.childcare.edit', compact('childcare'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $validator = Validator::make($data, [
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $childcare = Childcare::find($id);
        $childcare->update($data);

        return redirect()->route('admin.childcare.index')->with('success', 'Childcare updated!');
    }

    public function destroy(Request $request, $id)
    {
        $childcare = Childcare::find($id);
        $childcare->delete();

        return redirect()->route('admin.childcare.index')->with('success', 'Childcare deleted!');
    }
}
