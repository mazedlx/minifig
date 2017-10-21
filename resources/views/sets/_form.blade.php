<div class="form-group row">
    <label class="col-md-2 col-form-label" for="name">Name</label>
    <div class="col-md-10">
        <input type="text" name="name" class="form-control" value="{{ optional($set)->name }}" placeholder="Name" autofocus required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="number">Number</label>
    <div class="col-md-10">
        <input type="text" name="number" class="form-control" value="{{ optional($set)->number }}" placeholder="Number" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="file">Image</label>
    <div class="col-md-10">
        <input type="file" name="file" class="form-control">
    </div>
</div>
@if (optional($set)->filename)
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="file">Current Image</label>
    <div class="col-md-10">
        <img src="{{ url("/storage/{$set->filename}") }}" class="rounded" width="200px">
    </div>
</div>
@endif
