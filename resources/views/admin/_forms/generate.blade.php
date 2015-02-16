{!! Form::hidden('doc_id', $doc->id, ['id'=>'doc_id']) !!}

@foreach( $doc->vars as $var )
    <div class="form-group">
        {!! Form::label( $var->id, $var->name, ['class'=>'col-md-4 control-label'] ) !!}
        <div class="col-md-6">
            {!! Form::text('input['.$var->id.']', '', ['class' => 'form-control']) !!}
        </div>
    </div>
@endforeach

<div class="form-group">
    {!! Form::label( 'body', 'Document editor', ['class' => 'col-md-4 control-label'] ) !!}
    <div class="col-md-6">
        {!! Form::textarea( 'body', '', ['class'=>'form-control show-editor'] ) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitBtn, ['class'=>'btn btn-primary']) !!}
    </div>
</div>