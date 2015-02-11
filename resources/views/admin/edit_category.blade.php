@extends('admin._master.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Category: {{$category->name}}</div>
                    <div class="panel-body">
                        @include('admin._master.errors')
                        {!! Form::model( $category, ['method'=>'PATCH', 'route'=> ['admin.post.edit.category', $category->id], 'class'=>'form-horizontal', 'role'=>'form']) !!}
                            @include('admin._forms.category', ['submitBtn' => 'Update Category'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop