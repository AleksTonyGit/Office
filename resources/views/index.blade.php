@extends('layouts.app')
<div class="add_worker">
    <a href="{{url('create')}}" class="btn btn-lg btn-info" type="submit">Add new worker</a>
</div>
<div class="tab">
    <table class = "table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Date of creation</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach ($work as $w)
            <tr>
                <td>{{$w -> name}}</td>
                <td>{{$w -> created_at}}</td>
                <td>
                    <a href="{{ route('worker.show', $w->id) }}"
                       class="btn btn-md btn-success  glyphicon glyphicon-eye-open">
                    </a>
                    <a href="{{route('delete_worker',['id'=>$w->id])}}"
                       onclick="return confirm('Are you sure you want to delete?')">
                        <button type="button" class="btn btn-md btn-danger  glyphicon glyphicon-trash"></button>
                    </a>
                    <a href="{{ route('worker.edit', $w->id) }}"
                       class="btn btn-md btn-info  glyphicon glyphicon-pencil">
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $work->links() }}
</div>