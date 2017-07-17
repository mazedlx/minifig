<div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('number', 'Number', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('number', null, ['id' => 'number', 'class' => 'form-control', 'placeholder' => 'Number']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('file', 'Image', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('file', ['class' => 'form-control', 'multiple' => 'multiple']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
