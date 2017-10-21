<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Name</label>
    <div class="col-md-10">
        <input type="text" name="name" class="form-control" autofocus required value="{{ optional($minifig)->name }}">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="set_id">Set</label>
    <div class="col-md-10">
        <select name="set_id" class="form-control" required>
            @foreach($sets as $set)
            <option value="{{ $set->id }}" {{ optional($minifig)->set_id == $set->id ? 'selected' : '' }}>{{ $set->name }}</option>
            @endforeach
        </select>
    </div>
</div>

@if($minifig)
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="files">Current Image(s)</label>
    <div class="col-md-10">
    @forelse($minifig->images as $image)
        <div class="input-group">
            <img src="{{ url("/storage/{$image->filename}") }}" class="rounded" height="100px">
            <span class="input-group-addon">
                <input type="checkbox" name="images_to_delete[]" value="{{ $image->id }}"> <i class="fa fa-fw fa-trash"></i>
            </span>
        </div>
    @empty
        <div class="input-group">
            <input type="text" readonly class="form-control-plaintext" value="No images.">
        </div>
    @endforelse
    </div>
</div>
@endif

<div class="form-group row">
    <label class="col-md-2 col-form-label" for="files">Image(s)</label>
    <div class="col-md-10">
        <input type="file" name="files[]" multiple="multiple" class="form-control">
    </div>
</div>
