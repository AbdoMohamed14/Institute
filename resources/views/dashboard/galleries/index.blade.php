@extends('layouts.master')
@section('title', 'ATIC|Categories')
	
@section('css')
@endsection

@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Galleries</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Galleries</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<a href="{{route('dashboard.galleries.create')}}" type="button" style="color: aliceblue" class="btn btn-info btn-icon ml-2"><i class="fa fa-plus"></i></a>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
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
							<th scope="col">Name</th>
							<th scope="col">Name_Ar</th>
							<th scope="col">Description</th>
							<th scope="col">Description_Ar</th>
							<th scope="col">Handle</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($galleries as $gallery)
							<tr>
								<th scope="row">{{$gallery->id}}</th>
								<td><b>{{$gallery->name}}</b></td>
								<td><b>{{$gallery->name_ar}}</b></td>
								<td><b>{{$gallery->desc}}</b></td>
								<td><b>{{$gallery->desc_ar}}</b></td>
								<td>
									<div class="d-flex align-items-center">
										<a href="{{route('dashboard.galleries.show', $gallery->id)}}" class="btn btn-info" style="margin:5px">View</a>
										<a href="{{route('dashboard.galleries.edit', $gallery->id)}}" type="submit" class="btn btn-primary" style="margin:5px">Edit</a>
										<form action="{{route('dashboard.galleries.destroy', $gallery->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger" style="margin:5px">Remove</button>
										</form>
									</div>
								</td>
							  </tr>
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