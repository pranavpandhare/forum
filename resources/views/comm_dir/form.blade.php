<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Comment' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="comment" type="text" id="comment" value="{{ $comments->comment or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Submit' }}">
    </div>
</div>
