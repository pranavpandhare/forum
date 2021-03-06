@extends('layouts.app')
@include('pages.banner',['img_name'=>'/dps/'.$data[0]->dp,'p_title'=>$user, 'p_s_desc'=>'', 'author'=>'','time'=>'','userId'=>''])
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

                        <form method="POST" action="{{ url('/profiles/' . $data[0]->id . '/' . $data[0]->dp) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('profile_dir.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection