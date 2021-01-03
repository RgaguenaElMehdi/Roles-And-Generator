<div class="row">
<div class="col-md-6">
<div class="form-group">
    <label for="name" >name</label>
    <input type="text" step="" class="form-control" name="name" id="name" value="{{ old('name',optional($item)->name) }}">
</div>

</div>
<div class="col-md-6">
<div class="form-group">
    <label for="slug" >slug</label>
    <input type="text" step="" class="form-control" name="slug" id="slug" value="{{ old('slug',optional($item)->slug) }}">
</div>

</div>
</div>
