@if(Auth::check())
<form method="POST" action="{{ url('/comments') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-10 mx-auto">
				<div class="post-preview">
					<br />
					<br />
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<input type="hidden" class="form-control" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<input type="hidden" value="{{ $posts->post_id }}" name="post_id" id="post_id">
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Description</label>
							<textarea rows="3" class="form-control" placeholder=" Write your comment here!" name="comment" id="comment"></textarea>
						</div>
					</div>
					<br />
					<div class="form-group">
	  					<button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
					</div>
					<hr>
				</div>
			</div>
		</div>
	</div>
</form>
@endif
@include('post_dir.comments')