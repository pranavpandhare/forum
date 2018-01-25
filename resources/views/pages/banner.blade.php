<header class="masthead" style="background-image: url('{{ isset($img_name) ? url('/img/'.$img_name) : url('/img/blog.jpg') }}')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>{{$p_title or 'Create Blog'}}</h1>
          <h2 class="subheading">{{$p_s_desc or 'sample short description'}}</h2>
              @if(isset($userId))
              <span class="meta">
                @if(isset($email))
                  <a href="mailto:{{$email}}">{{$email}}</a>
                @else
                  <a href="{{ url('/myprofile/' . $userId) }}">{{ $author or 'sample description'}}</a>
                @endif
                {{$time or ' ,Aug 24, 2017'}}</span>
              @endif
        </div>
      </div>
    </div>
  </div>
</header>