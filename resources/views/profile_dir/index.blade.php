@extends('layouts.app')
@include('pages.banner',['img_name'=>'/dps/'.$user->profile->dp,'p_title'=>$user->name .' ' .$user->profile->last_name, 'p_s_desc'=>$user->profile->mob_no, 'email'=>$user->email,'time'=>$user->profile->birthdate, 'userId'=> Auth::user()->id])
@section('content')
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <h2 class="subheading">{{ $user->profile->about }}</h2>
          </div>
        </div>
      </div>
    </article>
    @include('profile_dir.show')
@endsection
