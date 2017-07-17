<div class="form-group">
    {!! Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('set_id', 'Set', array('class' => 'col-md-2 control-label')); !!}
    <div class="col-md-6">
        {!! Form::select('set_id', $sets_id, null, array('class' => 'form-control')); !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('files', 'Files', array('class' => 'col-md-2 control-label')); !!}
    <div class="col-md-6">
        {!! Form::file('files[]', array('class' => 'form-control', 'multiple' => 'multiple')); !!}
    </div>
</div>
@forelse($images as $image)
    <div class="form-group">
        <div class="col-md-6 col-md-offset-2">
            <div class="has-error">
                <div class="checkbox">
                <img src="{{ url()->to('storage/' . $image->filename) }}" class="img img-thumbnail" width="150px">
                    <label>
                        {!! Form::checkbox('images_to_delete[]', $image->id) !!} &times;
                    </label>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse
<div class="form-group">
    <div class="col-md-6 col-md-offset-2">
        {!! Form::submit($labelSubmitButton, ['class'=>'btn btn-primary']) !!}
    </div>
</div>
