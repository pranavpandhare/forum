<div class="container">
  <div class="row">
    <div class="col-lg-10 col-md-10 mx-auto">
      @foreach($posts->comments as $item)
        <div class="post-preview" id="comm_{{$item->id}}">
          <h5 class="post-subtitle">
            {{ $item->comment }}
          </h5>
          <p class="post-meta">Commented by
            @php
              $user = \DB::table('comments')->join('users','comments.user_id','=','users.id')->where('users.id','=',$item->user_id)->select('users.name')->groupBy('users.name')->get();
            @endphp
            <a href="{{ url('/myprofile/' . $item->user_id) }}">{{ $item->user->name }}</a>
            on {{ $item->updated_at }}
          </p>
          <hr>
        </div>
      @endforeach
    </div>
  </div>
</div>