@extends('admin._master.master')
@section('content')
    @if(count($docs) > 0)
        <ul>
            @foreach($docs as $doc)
                <li>
                    {!! link_to_route('admin.doc.edit', 'View '.$doc->name, ['doc'=>$doc->id]) !!}
                    - or -
                    {!! Form::open(['route'=>['admin.doc.destroy', $doc->id], 'method'=>'delete', 'class'=>'form-inline', 'style'=>'display:inline']) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @else
        <h1>No Documents found!</h1>
    @endif
@stop