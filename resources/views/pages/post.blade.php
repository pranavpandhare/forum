@extends('layouts.app')
@include('pages.banner',['img_name'=>'post-bg.jpg','p_title'=>'Post from Goa', 'p_s_desc'=>'Goa', 'author'=>'Pranav','time'=>' , August 24, 2017'])
@section('content')
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <h2 class="subheading">{{$p_desc or 'Sample Descritpion'}}</h2>
          </div>
        </div>
      </div>
    </article>
@endsection