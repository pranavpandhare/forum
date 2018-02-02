<div class="control-group">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label>Title</label>
    <input type="text" class="form-control" value="{{ $posts->title }}" name="title" id="title" data-validation-required-message="Please enter Title.">
    <p class="help-block text-danger"></p>
  </div>
</div>
<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>Short Description</label>
    <input type="text" class="form-control" value="{{ $posts->short_desc }}" name="short_desc" id="short_desc" data-validation-required-message="Please enter Short Description.">
    <p class="help-block text-danger"></p>
  </div>
</div>
<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>Description</label>
    <textarea rows="5" class="form-control" name="description" id="description" data-validation-required-message="Please enter a Description.">{{ $posts->description }}</textarea>
    <p class="help-block text-danger"></p>
  </div>
</div>
<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>Image</label>
    <input type="file" class="form-control" value="{{ $posts->img_name }}" name="img_name" id="img_name">
    <p class="help-block text-danger"></p>
  </div>
</div>
<br>
<div class="form-group">
  <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
</div>