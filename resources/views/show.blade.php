@extends('layouts.app')
@foreach($work as $w)
    <div class="return">
        <a href="{{url('index')}}" class="btn btn-md btn-info" type="submit">Return</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="name">
                Worker name:{{$w->name}} <br/>
            </div>
            <div class="name">
                Birthday: {{$w->birthday}} <br/>
            </div>
            <div class="name">
                Gender: {{$w->gender}} <br/>
            </div>
            <div class="name">
                Adress: {{$w->adress}}<br/>
            </div>
            <div class="name">
                Position: {{$w->position}}
            </div>
        </div>
    </div>

@endforeach