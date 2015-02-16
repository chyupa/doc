@extends('admin._master.master')
@section('content')
    @if( $users->count() )
        <ul>
        @foreach($users as $user)
          <li>
              {{$user->name}} - {{$user->username}} -
              @foreach($user->category->documents as $doc)
                  <br>
                  {!! link_to_route( 'admin.get.pdf.generate', 'Generate pdf from '.$doc->name, [ 'doc'=>$doc->id, 'user' => $user->id ] )  !!}

              @endforeach
          </li>
        @endforeach
        </ul>
    @else
        <h1 class="text-center">No users found.</h1>
    @endif
@stop