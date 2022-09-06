@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Users</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Users</span>
						</div>
					</div>
					@if (Auth::user()->is_admin)
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<a href="{{route('dashboard.users.create')}}" type="button" style="color: aliceblue" class="btn btn-info btn-icon ml-2"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					@endif
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
							<th scope="col">Email</th>
							<th scope="col">Handle</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<th scope="row">{{$user->id}}</th>
								<td><b>{{$user->name}}</b></td>
								<td><b>{{$user->name_ar}}</b></td>
								<td><b>{{$user->email}}</b></td>
								<td>
										@if (Auth::user()->is_admin)
											<form action="{{route('dashboard.users.destroy', $user->id)}}" method="POST">
												@csrf
												@method('DELETE')
												<input type="submit" class="btn btn-danger" value="Remove">
											</form>
										@endif
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