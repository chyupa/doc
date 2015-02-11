
<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('doc_source', 'Body', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea( 'doc_source', old('doc_source'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitBtn, ['class'=>'btn btn-primary']) !!}
    </div>
</div>