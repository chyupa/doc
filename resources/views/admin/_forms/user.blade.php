
<div class="form-group">
    {!! Form::label('name', 'Name', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('username', 'Username', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('username', old('username'), ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4">
        @if(isset($user_cat))
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
</div>

<div class="form-group">
    {!! Form::label('role_id', 'Role', ['class'=>'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitBtn, ['class'=>'btn btn-primary']) !!}
    </div>
</div>
