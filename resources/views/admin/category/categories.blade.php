@extends('admin._master.master')
@section('content')
    @if(count($categories) > 0)
        <ul>
            @foreach($categories as $cat)
                <li>
                    {!! link_to_route('admin.get.edit.category', 'View '.$cat->name, ['category'=>$cat->id]) !!}
                    - or -
                    {!! Form::open(['route'=>['admin.post.delete.category', $cat->id], 'method'=>'delete', 'class'=>'form-inline', 'style'=>'display:inline']) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @else
        <h1>No Categories found!</h1>
    @endif
@stop