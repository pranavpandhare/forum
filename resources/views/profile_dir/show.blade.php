
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach($user->posts as $item)
            <div class="post-preview">
              <a href="{{ url('/posts/' . $item->id) }}">
                <h2 class="post-title">
                  {{ $item->title }}
                </h2>
                <h3 class="post-subtitle">
                  {{ $item->short_desc }}
                </h3>
              </a>
              <p class="post-meta">Posted by
                <a href="{{ url('/myprofile/' . $item->user_id) }}">{{ $user->name }}</a>
                on {{ $item->publish_at }}</p>
            </div>
          @endforeach
          <hr>
          <hr>
          <!-- Pager -->
          <!--  -->
        </div>
      </div>
    </div>
