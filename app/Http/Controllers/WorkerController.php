<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Position;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WorkerController extends Controller
{
    public function index()
    {
        $work=Worker::select('workers.id','genders.name as gender','positions.name as position','workers.name','workers.adress','workers.birthday','workers.created_at')
            ->join('genders','workers.gender_id','=','genders.id')
            ->join('positions','workers.position_id','=','positions.id')
            ->paginate(10);
        return view('index', compact('work'));
    }

    public function create()
    {
        $worker=new Worker;
        $gender_id=Gender::pluck('name','id');
        $position_id=Position::pluck('name','id');
        return view('create',compact('worker','gender_id','position_id'));
    }
    public function store(Request $request)
    {
        $rules = ['name' => 'required',
                  'gender_id'=>'required',
                  'position_id'=>'required',
                  'adress'=>'required',
                  'birthday'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return back()->withErrors($validator,'worker')->withInput();
        }
        $worker['name']=$request->name;
        $worker['gender_id']=$request->gender_id;
        $worker['position_id']=$request->position_id;
        $worker['adress']=$request->adress;
        $worker['birthday']=$request->birthday;
        Worker::create($worker);
        return back()->with('success1', 'New Worker added successfully.');
    }
    public function getDelete($id)
    {
        $worker = Worker::find($id);
        $worker->delete();
        return redirect('index');
    }
    public function edit($id)
    {
        $w = Worker::find($id);
        $worker=new Worker;
        $gender_id=Gender::pluck('name','id');
        $position_id=Position::pluck('name','id');
        return view('edit', compact('w','gender_id','worker','position_id'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gender_id'=>'required',
            'position_id'    =>'required',
            'name'           =>'required',
            'adress'         =>'required',
            'birthday'       =>'required'
        ]);

        $w = Worker::find($id);
        $wUpdate = $request->all();
        $w->update($wUpdate);
        return redirect('index');
    }

    public function show($id)
    {
        $work=DB::table('workers')
            ->join('genders','workers.gender_id','=','genders.id')
            ->join('positions','workers.position_id','=','positions.id')
            ->select('workers.id','genders.name as gender','positions.name as position','workers.name','workers.adress','workers.birthday','workers.created_at')
            ->where('workers.id','=',$id)
            ->get();
        return view('show', compact('work'));
    }
}
