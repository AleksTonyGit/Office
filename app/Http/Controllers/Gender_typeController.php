<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Gender_typeController extends Controller
{
    public function getForm()
    {
        return view('create');
    }


    public function postCreate(Request $request)
    {
        $rules = ['name' => 'required'];
        $input = ['name' => null];
        $validator1 = Validator::make($request->all(), $rules);
        if($validator1->fails())
        {
            return back()->withErrors($validator1)->withInput();
        }
        Gender::create(['name' => $request->get('name')]);
        return back()->with('success1', 'New Gender type added successfully.');
    }
}
