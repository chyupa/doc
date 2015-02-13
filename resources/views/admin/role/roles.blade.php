@extends('admin._master.master')
@section('content')
    @if(count($roles) > 0)
        <ul>
            @foreach($roles as $role)
                <li>
                    {!! link_to_route('admin.role.edit', 'View '.$role->name, ['role'=>$role->id]) !!}
                    - or -
                    {!! Form::open(['route'=>['admin.role.destroy', $role->id], 'method'=>'delete', 'class'=>'form-inline', 'style'=>'display:inline']) !!}
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