<div class="control-group">
  <div class="form-group col-xs-12 floating-label-form-group controls">
    <label>Last Name</label>
    <input type="text" class="form-control" value="{{ $data[0]->last_name }}" name="last_name" id="last_name">
    <p class="help-block text-danger"></p>
  </div>
</div>
<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>Mobile Number</label>
    <input type="text" class="form-control" value="{{ $data[0]->mob_no }}" name="mob_no" id="mob_no">
    <p class="help-block text-danger"></p>
  </div>
</div>
<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>Birth Date</label>
    <input type="date" class="form-control" value="{{ $data[0]->birthdate }}" name="birthdate" id="birthdate">
    <p class="help-block text-danger"></p>
  </div>
</div>
<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>About</label>
    <textarea rows="5" class="form-control" name="about" id="about">{{ $data[0]->about }}</textarea>
    <p class="help-block text-danger"></p>
  </div>
</div>
<div class="control-group">
  <div class="form-group floating-label-form-group controls">
    <label>Display Picture</label>
    <input type="file" class="form-control" value="{{ $data[0]->dp }}" placeholder="Please choose Display Picture" name="dp" id="dp">
  </div>
</div>
<br>
<div class="form-group">
  <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
</div>