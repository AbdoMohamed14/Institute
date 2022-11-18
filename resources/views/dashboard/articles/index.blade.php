@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Articles</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Articles</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<a href="{{route('dashboard.articles.create')}}" type="button" style="color: aliceblue" class="btn btn-info btn-icon ml-2"><i class="fa fa-plus"></i></a>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection


				<!-- content section -->
@section('content')

				@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
					<button type="button" class="close" data-dismiss = 'alert'>x</button>
				</div>
				@endif
				<!-- row -->
				<div class="row">
					<table class="table table-bordered" style="text-align: center">
						<thead class="thead-light">
						  <tr>
							<th scope="col">#</th>
							<th scope="col">Title</th>
							<th scope="col">Title_Ar</th>
							<th scope="col">Content</th>
							<th scope="col">Content_ar</th>
							<th scope="col">category</th>
							<th scope="col">Auther</th>
							<th scope="col">Handle</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($articles as $article)
							<tr>
								<th scope="row">{{$article->id}}</th>
								<td><b>{{$article->title}}</b></td>
								<td><b>{{$article->title_ar}}</b></td>
								<td><b>{!!Str::limit($article->content, 20)!!}</b></td>
								<td><b>{!!Str::limit($article->content_ar, 20)!!}</b></td>
								<td><b>{{$article->category->name}}</b></td>
								<td><b>{{$article->auther->name}}</b></td>
								<td>
									<div class="d-flex align-items-center">
										<a href="{{route('dashboard.articles.edit', $article->id)}}" class="btn btn-primary" style="margin:5px">Edit</a>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$article->id}}">
											Delete
										  </button>
									</div>
								</td>
							  </tr>

							  <!--Delete-Modal -->
									<div class="modal fade" id="deleteModal{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Delete Article</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
												<form action="{{route('dashboard.articles.destroy',$article->id)}}" method="POST">
													@csrf
													@method('DELETE')
													Click Delete to confirm.
													</div>
													<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-danger">Delete</button>
												</form>
											</div>
										</div>
										</div>
									</div>
							@endforeach

						</tbody>
					  </table>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection