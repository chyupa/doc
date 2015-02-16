
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
        {!! Form::label('', 'Variables', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {{--{!! Form::text('no_of_vars', old('no_of_vars'), ['class'=>'form-control']) !!}--}}
            {{--{!! Form::button('Show vars', ['class'=>'btn btn-default show-vars']) !!}--}}
            <input type="hidden" id="no_of_vars" value="1"/>
            {!! Form::label('input[1][name]', 'Input Label 1') !!}
            {!! Form::text('input[1][name]', old('input[1][name]'), ['class'=>'form-control']) !!}
            {!! Form::label('input[1][var]', 'Input Code 1') !!}
            {!! Form::text('input[1][var]', old('input[1][var]'), ['class'=>'form-control']) !!}
            {!! Form::button('Add vars', ['class'=>'btn btn-default add-vars']) !!}
        </div>
    </div>
@else
    <div class="form-group">
        {!! Form::label('', 'Variables', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            <input type="hidden" id="no_of_vars" value="{{$no_of_vars}}"/>
            @foreach($vars as $key=>$val)
                {{--{{dd($val)}}--}}
                <br>
                {!! Form::label('input['.($key+1).'][name]', 'Input Label '.($key+1).'') !!}
                {!! Form::text('input['.($key+1).'][name]', $val->name, ['class'=>'form-control']) !!}
                {!! Form::label('input['.($key+1).'][var]', 'Input Code '.($key+1).'') !!}
                {!! Form::text('input['.($key+1).'][var]', $val->var, ['class'=>'form-control']) !!}
            @endforeach
            {!! Form::button('Add vars', ['class'=>'btn btn-default add-vars']) !!}
        </div>
    </div>
@endif

<div class="form-group">
    {!! Form::label('body', 'Body', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea( 'body', old('body'), ['class'=>'form-control'] ) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitBtn, ['class'=>'btn btn-primary']) !!}
    </div>
</div>