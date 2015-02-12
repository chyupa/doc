@extends('admin._master.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Doc: {{$doc->name}}</div>
                    <div class="panel-body">
                        @include('admin._master.errors')
                        {!! Form::model( $doc, ['method'=>'PUT', 'route'=> ['admin.doc.update', $doc->id], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                        @include('admin._forms.doc', ['submitBtn' => 'Update Doc'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop