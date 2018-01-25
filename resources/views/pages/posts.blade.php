@extends('layouts.app')
@include('pages.banner')
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach($posts as $item)
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
                @php
                  $user = \DB::table('posts')->join('users','posts.user_id','=','users.id')->where('users.id','=',$item->user_id)->select('users.name')->groupBy('users.name')->get();
                @endphp
                <a href="{{ url('/myprofile/' . $item->user_id) }}">{{ $user[0]->name }}</a>
                on {{ $item->publish_at }}</p>
            </div>
          @endforeach
          <hr>
          <hr>
          <!-- Pager -->
          <div class="clearfix pagination-wrapper">
            {{ $posts->render("pagination::bootstrap-4") }}
        </div>
        </div>
      </div>
    </div>
@stop