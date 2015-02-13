
<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    @if($categories->count())
        <div class="col-md-offset-4">
            @foreach( $categories as $cat )
                <label class="checkbox-inline">
                    {!! Form::checkbox('cat[]', $cat->id ) !!} {{$cat->name}}
                </label>
            @endforeach
        </div>
    @endif
</div>


<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitBtn, ['class'=>'btn btn-primary']) !!}
    </div>
</div>