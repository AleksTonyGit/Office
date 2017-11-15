<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    public function getForm()
    {
        return view('create');
    }


    public function postCreate(Request $request)
    {
        $rules = ['name' => 'required'];
        $input = ['name' => null];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        Position::create(['name' => $request->get('name')]);
        return back()->with('success', 'New Position added successfully.');
    }
}
