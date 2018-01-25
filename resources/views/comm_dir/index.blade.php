@extends('layouts.app')
@include('pages.banner',['img_name'=>'comments.jpg','p_title'=>$user, 'p_s_desc'=>'', 'author'=>'','time'=>'','userId'=>''])
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Comments</div>
                    <div class="panel-body">

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Post Name</th><th>Comment</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        @php
                                            $user = \DB::table('comments')->join('posts','comments.post_id','=','posts.id')->where('posts.id','=',$item->post_id)->select('posts.title')->get();
                                        @endphp
                                        <td><a href="{{ url('/posts/' . $item->post_id) }}"> {{ $user[0]->title }} </a></td><td>{{ $item->comment }}</td>
                                        <td>
                                            <a href="{{ url('/comments/' . $item->id) }}" title="View Comment"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/comments/' . $item->id . '/edit') }}" title="Edit Comment"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/comments' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Comment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                            <div class="pagination-wrapper"> {!! $comments->appends(['search' => Request::get('search')])->render() !!} </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
