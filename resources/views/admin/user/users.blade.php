@extends('admin._master.master')
@section('content')
    @if($users->count())
        <ul>
        @foreach($users as $user)
            <li>
                {{--{{ link_to_route('admin.get.edit.user', 'View '.$user->id, ['user'=>$user->id])  }}--}}
                {!! link_to_route('admin.get.edit.user', 'View '.$user->name, ['user'=>$user->id]) !!}
            </li>
        @endforeach
        </ul>
    @else
        <h1>No users found which is odd.</h1>
    @endif
@stop
