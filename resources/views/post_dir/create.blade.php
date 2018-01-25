@extends('layouts.app')
@include('pages.banner',['img_name'=>'create.jpg','p_title'=>$user->name, 'p_s_desc'=>'', 'author'=>'','time'=>'', 'userId'=>''])
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Apply for New Post</div>
                    <br />
                        <br />
                    <div class="panel-body">
                        <a href="{{ url('/posts') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/posts') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                    <input type="hidden" value="{{ $user->id }}" name="user_id" id="user_id">
                            @include ('post_dir.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
