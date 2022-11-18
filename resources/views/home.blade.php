@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Dashboard</h4><span class="text-muted mt-1 tx-16 mr-2 mb-0">/ index</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<div class="d-flex mb-3">
					<h6 class="content-title mb-0 my-auto">Latest Events</h6>
				</div>
				<!-- row -->
				<div class="row justify-content-center">
					<!-- latest events -->
						@foreach ($events as $event)
						<div class="col">
							<div class="card" style="width: 18rem; height:22rem">
								<img class="card-img-top" src="{{asset('event_photos/' .$event->image)}}" alt="Card image cap" style="height: 250px">
								<div class="card-body">
								  <h5 class="card-title">{{$event->title}}</h5>
								  <p class="card-text">{{$event->auther->name}}</p>
								</div>
							  </div>
						</div>
						@endforeach
					<!-- end latest Events row -->
				</div>	
				<hr>
				<div class="d-flex mb-3">
					<h6 class="content-title mb-0 my-auto">Latest Articles</h6>
				</div>
				<div class="row justify-content-center">
					<!-- latest Articles row -->
						@foreach ($articles as $article)
						<div class="col">
							<div class="card" style="width: 18rem;">
								<img class="card-img-top" src="{{asset('article_photos/' .$article->image)}}" alt="Card image cap" style="width: 100%; height:10rem">
								<div class="card-body">
								  <h5 class="card-title">{{$article->title}}</h5>
								  <p class="card-text">{!!$article->content!!}</p>
								</div>
							  </div>
						</div>
						@endforeach
					</div>					
					<!-- latest events row -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection