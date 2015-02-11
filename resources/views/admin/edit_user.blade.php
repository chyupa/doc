@extends('admin._master.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User: {{ $user->name }}</div>
                    <div class="panel-body">
                        @include('admin._master.errors')
                        {!! Form::model( $user, [ 'method'=>'PATCH', 'route'=>['admin.post.edit.user', $user->id], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('admin._forms.user', ['submitBtn' => 'Update User'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop