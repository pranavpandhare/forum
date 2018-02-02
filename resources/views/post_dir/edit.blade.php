@extends('layouts.app')
@include('pages.banner',['img_name'=>'edit.jpg','p_title'=>$user, 'p_s_desc'=>'', 'author'=>'','time'=>'','userId'=>''])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">   
                    <div class="panel-body">
                        <a href="{{ url('/posts') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/posts/' . $posts->id . '/' . $posts->img_name) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <input type="hidden" value="Pending" name="status" id="status">
                            @include ('post_dir.e_form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection