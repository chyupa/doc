@extends('admin._master.master')
@section('content')
    @if( $users->count() )
        <ul>
        @foreach($users as $user)
          <li>
              {{$user->name}} - {{$user->username}} -
              @foreach($user->docs as $doc)
                  {{ $doc->name  }}
              @endforeach
          </li>
        @endforeach
        </ul>
    @else
        <h1 class="text-center">No users found.</h1>
    @endif
@stop