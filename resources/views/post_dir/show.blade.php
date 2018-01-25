@extends('layouts.app')
@include('pages.banner',['img_name'=>$posts->img_name,'p_title'=>$posts->title, 'p_s_desc'=>$posts->short_desc, 'author'=>$posts->user->name,'userId'=>$posts->user->id, 'time'=>' Posted on '.$posts->publish_at])
@section('content')
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <h2 class="subheading">{{ $posts->description }}</h2>
          </div>
        </div>
      </div>
    </article>
    @include('post_dir.comm_box')
@endsection