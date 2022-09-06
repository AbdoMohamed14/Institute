@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Testmonials</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Testmonials</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<a href="{{route('dashboard.testmonials.create')}}" type="button" style="color: aliceblue" class="btn btn-info btn-icon ml-2"><i class="fa fa-plus"></i></a>
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
							<th scope="col">Auther</th>
							<th scope="col">Auther_Ar</th>
							<th scope="col">Content</th>
							<th scope="col">Content_ar</th>
							<th scope="col">Handle</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($testmonials as $testmonial)
							<tr>
								<th scope="row">{{$testmonial->id}}</th>
								<td><b>{{$testmonial->auther}}</b></td>
								<td><b>{{$testmonial->auther_ar}}</b></td>
								<td><b>{{$testmonial->content}}</b></td>
								<td><b>{{$testmonial->content_ar}}</b></td>
								<td>
									<div class="d-flex align-items-center">
										<a href="{{route('dashboard.testmonials.edit', $testmonial->id)}}" class="btn btn-primary" style="margin:5px">Edit</a>
										<form action="{{route('dashboard.testmonials.destroy', $testmonial->id)}}" method="POST">
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