@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Instructors</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Instructors</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<a href="{{route('dashboard.instructors.create')}}" type="button" style="color: aliceblue" class="btn btn-info btn-icon ml-2"><i class="fa fa-plus"></i></a>
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
							<th scope="col">Preif</th>
							<th scope="col">Preif_ar</th>
							<th scope="col">Desc</th>
							<th scope="col">Desc_Ar</th>
							<th scope="col">Position</th>
							<th scope="col">Position_Ar</th>
							<th scope="col">Handle</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($instructors as $instructor)
							<tr>
								<th scope="row">{{$instructor->id}}</th>
								<td><b>{{$instructor->name}}</b></td>
								<td><b>{{$instructor->name_ar}}</b></td>
								<td><b>{{$instructor->preif}}</b></td>
								<td><b>{{$instructor->preif_ar}}</b></td>
								<td><b>{{$instructor->desc}}</b></td>
								<td><b>{{$instructor->desc_ar}}</b></td>
								<td><b>{{$instructor->position}}</b></td>
								<td><b>{{$instructor->position_ar}}</b></td>
								<td>
									<div class="d-flex align-items-center">
										<a href="" class="btn btn-info">View</a>
										<a href="{{route('dashboard.instructors.edit', $instructor->id)}}" class="btn btn-primary" style="margin:5px">Edit</a>
										<form action="{{route('dashboard.instructors.destroy', $instructor->id)}}" method="POST">
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