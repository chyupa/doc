@extends('admin._master.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Document</div>
                    <div class="panel-body">
                        @include('admin._master.errors')
                        {!! Form::open(['route'=>'admin.post.create.doc', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('admin._forms.doc', ['submitBtn' => 'Create Document'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop