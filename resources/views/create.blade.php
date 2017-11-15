@extends('layouts.app')
<div class="well">
    <div class="return">
        <a href="{{url('index')}}" class="btn btn-md btn-info" type="submit">Return</a>
    </div>

    <div class="add_pos">
        <div class="title_position">
            <h4> If you want to add new position - please fill out the form</h4>
        </div>
        <form name="createnewposition" method="POST" action="{{route('create_position')}}">
            {{ csrf_field() }}
            <fieldset>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ( count( $errors ) > 0 )
                    <div class="alert alert-danger" role="alert">
                        <?php
                            $messages = $errors->all(':message');
                        ?>
                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <h5>Warning!</h5>
                        <ul>
                            @foreach($messages as $message)
                                {{$message}}
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="name">Position</label>
                    <input name="name" type="text" class="form-control" placeholder="Position" value="{{old('name')}}">
                    <button type="submit" class="btn btn-success">Create Position!</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<div class="well">
    @if ($message = Session::get('success1'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

        @if ( count( $errors ) > 0 )
            <div class="alert alert-danger" role="alert">
                <?php
                $messages = $errors->worker->all(':message');
                ?>
                <button type="button" class="close" data-dismiss="alert">×</button>

                <h5>Warning!</h5>
                <ul>
                    @foreach($messages as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            {{--<button type="button" class="close" data-dismiss="alert">×</button>
            <h5>Warning!</h5>
            <ul>
                @foreach($messages as $message)
                    {{$message}}
                @endforeach
            </ul>--}}



    {!! Form::model($worker, array('action'=>'WorkerController@store','files'=>true,'class'=>'form-horizontal')) !!}
    <div class='form-group'>
        {!! Form::label('gender_id','Gender Type',['class'=>'col-md-2'])!!}
        {!! Form::select('gender_id', $gender_id, '', ['class'=>'col-md-4','placeholder'=>'Select Gender'])!!}
    </div>

    <div class='form-group'>
        {!! Form::label('position_id','Position', ['class'=>'col-md-2'])!!}
        {!! Form::select('position_id', $position_id, '', ['class'=>'col-md-4','placeholder'=>'Select Position'])!!}
    </div>

    <div class='form-group'>
        {!! Form::label('name','Name', ['class'=>'col-md-2'])!!}
        {!! Form::text('name', '', ['class'=>'col-md-4'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('birthday' , 'Birthday:',['class'=>'col-md-2']) !!}
        {!! Form::date('birthday', null, ['class'=>'col-md-4']) !!}
    </div>

    <div class='form-group'>
        {!! Form::label('adress','Adress', ['class'=>'col-md-2'])!!}
        {!! Form::text('adress', '', ['class'=>'col-md-4'])!!}
    </div>
    <button class="btn btn-success" type="submit">Add Worker</button>
    {!! Form::close() !!}
</div>

