
<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    @if( count( $categories ) )
        <div class="col-md-offset-4">
            @if(isset($doc_cat))
                @foreach($categories as $cat)
                    <label class="checkbox-inline">
                        {!! Form::checkbox('cat[]', $cat->id, $doc_cat->contains($cat->id) ? true : false ) !!} {{$cat->name}}
                    </label>
                @endforeach
            @else
                @foreach($categories as $cat)
                    <label class="checkbox-inline">
                        {!! Form::checkbox('cat[]', $cat->id ) !!} {{$cat->name}}
                    </label>
                @endforeach
            @endif
        </div>
    @endif
</div>

@if( ! isset($no_of_vars) )
    <div class="form-group">
        {!! Form::label('no_of_vars', 'Number of variables', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('no_of_vars', old('no_of_vars'), ['class'=>'form-control']) !!}
            {!! Form::button('Show vars', ['class'=>'btn btn-default show-vars']) !!}
        </div>
    </div>
@else
    <div class="form-group">
        {!! Form::label('no_of_vars', 'Number of variables', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('no_of_vars', $no_of_vars, ['class'=>'form-control']) !!}
            {!! Form::button('Show vars', ['class'=>'btn btn-default show-vars']) !!}
            @foreach($vars as $key=>$val)
                <br>
                <label>Input Label {{$key+1}}</label>
                <input type="text" name="input[{{$key+1}}][]" class="form-control" value="{{$val->name}}">
                <label>Code {{$key+1}}</label>
                <input type="text" name="input[{{$key+1}}][]" class="form-control" value="{{$val->var}}">
            @endforeach
        </div>
    </div>
@endif

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