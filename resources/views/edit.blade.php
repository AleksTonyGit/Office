@extends('layouts.app')
<div class="well">
    <div class="return">
        <a href="{{url('index')}}" class="btn btn-md btn-info" type="submit">Return</a>
    </div>

    {!! Form::model($w, ['route'=>['worker.update', $w->id], 'method'=>'POST', 'class'=>'form-horizontal']) !!}
    <div class='form-group'>
        {!! Form::label('gender_id','Gender Type', ['class'=>'col-md-2'])!!}
        {!! Form::select('gender_id', $gender_id, '', ['class'=>'col-md-2','placeholder'=>'Select Gender'])!!}
    </div>

    <div class='form-group'>
        {!! Form::label('position_id','Select Position', ['class'=>'col-md-2'])!!}
        {!! Form::select('position_id', $position_id, '', ['class'=>'col-md-2','placeholder'=>'Select Position'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Worker name:', ['class'=>'col-md-2']) !!}
        {!! Form::text('name', null, ['class'=>'col-md-4']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('adress', 'Adress:', ['class'=>'col-md-2']) !!}
        {!! Form::textarea('adress', null, ['class'=>'col-md-4']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('birthday' , 'Birthday:',['class'=>'col-md-2']) !!}
        {!! Form::date('birthday', null, ['class'=>'col-md-4']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-primary col-sm-2']) !!}
    </div>
    {!! Form::close() !!}
</div>