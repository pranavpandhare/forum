@extends('layouts.app')
@include('pages.banner',['img_name'=>'blogs.jpg','p_title'=>'', 'p_s_desc'=>'', 'author'=>'','time'=>'','userId'=>''])
@section('content')
	<div class="container"><div class="row">
		@foreach($posts as $item)
			
				<div class="col-lg-6 portfolio-item">
					<div class="card h-100">
						<a href="{{ url('/posts/' . $item->id) }}"><img class="card-img-top" src="{{ asset('/img/' .$item->img_name) }}" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
							<a href="{{ url('/posts/' . $item->id) }}">{{ $item->title }}</a>
							</h4>
							<p class="card-text">{{ $item->short_desc }}</p>
						</div>
					</div>
				</div>
			
		@endforeach
		</div>
		<div class="clearfix pagination-wrapper">
            {{ $posts->render("pagination::bootstrap-4") }}
        </div>
	</div>
@stop