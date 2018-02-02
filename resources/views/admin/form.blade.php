<div class="form-group">
    <label for="title" class="col-md-4 control-label">{{ 'Image' }}</label>
    <div class="col-md-8">
        <img class="media-object" style="width:597px" src="{{ asset('/img/' .$posts->img_name) }}" alt="">
    </div>
</div>
<div class="form-group">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-8">
        <input class="form-control" name="title" type="text" id="title" value="{{ $posts->title or ''}}" >
    </div>
</div>
<div class="form-group">
    <label for="short_desc" class="col-md-4 control-label">{{ 'Short Description' }}</label>
    <div class="col-md-8">
        <input class="form-control" name="short_desc" type="text" id="short_desc" value="{{ $posts->short_desc or ''}}" >
    </div>
</div>
<div class="form-group">
    <label for="Description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-8">
        <textarea rows="15" class="form-control" name="description" id="description">{{ $posts->description }}</textarea>
    </div>
</div>
<div class="form-group">
    <label for="Status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <select name="status" id="status">
        <option value="Approved">Approved</option>
        <option value="Rejected">Rejected</option>
    </select> 
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit">
    </div>
</div>
