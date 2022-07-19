@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col">
	<h3 class="page-title">Hồ sơ</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng điều khiển</a></li>
		<li class="breadcrumb-item active">Hồ sơ</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="profile-header">
			<div class="row align-items-center">
				<div class="col-auto profile-image">
					<a href="#">
						<img class="rounded-circle" alt="User Image" src="@if(!empty(auth()->user()->avatar)){{asset('storage/users/'.auth()->user()->avatar)}}@endif">
					</a>
				</div>
				<div class="col ml-md-n2 profile-user-info">
					<h4 class="user-name mb-0">{{auth()->user()->name}}</h4>
					<h6 class="text-muted">{{auth()->user()->email}}</h6>
					TimeZone: <h5>{{date_default_timezone_get()}}</h5>
                    Current Date and Time: <h5>{{date('d M,Y h:i:s a', time())}}</h5>
				</div>

			</div>
		</div>
		<div class="profile-menu">
			<ul class="nav nav-tabs nav-tabs-solid">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#per_details_tab">Về</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#password_tab">Mật khẩu</a>
				</li>
			</ul>
		</div>
		<div class="tab-content profile-tab-cont">

			<!-- Personal Details Tab -->
			<div class="tab-pane fade show active" id="per_details_tab">

				<!-- Personal Details -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title d-flex justify-content-between">
									<span>Thông tin cá nhân</span>
									<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Sửa</a>
								</h5>
								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Tên</p>
									<p class="col-sm-10">{{auth()->user()->name}}</p>
								</div>

								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email </p>
									<p class="col-sm-10">{{auth()->user()->email}}</p>
								</div>

								<div class="row">
									<p class="col-sm-2 text-muted text-sm-right mv-0 mb-sm-3">Vai trò người dùng</p>
									<p class="col-sm-10">
										@foreach (auth()->user()->getRoleNames() as $role)
										{{$role}}
										@endforeach
									</p>
								</div>

							</div>
						</div>

						<!-- Edit Details Modal -->
						<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Thông tin cá nhân</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="POST" enctype="multipart/form-data" action="{{route('profile')}}">
											@csrf
											<div class="row form-row">
												<div class="col-12">
													<div class="form-group">
														<label>Họ tên</label>
														<input class="form-control" name="name" type="text" value="{{auth()->user()->name}}" placeholder="Full Name">
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<label>email</label>
														<input class="form-control" name="email" type="text" value="{{auth()->user()->email}}" placeholder="Email">
													</div>
												</div>
												@can('update-role')
												<div class="col-12">
													<div class="form-group">
														<label>Vai trò</label>
														<select class="form-control select edit_role" name="role">
															@foreach ($roles as $role)
																<option value="{{$role->name}}">{{$role->name}}</option>
															@endforeach
														</select>
													</div>
												</div>
												@endcan
												<div class="col-12">
													<div class="form-group">
														<label>Hình đại diện</label>
														<input type="file" value="{{auth()->user()->avatar}}" class="form-control" name="avatar">
													</div>
												</div>

											</div>
											<button type="submit" class="btn btn-primary btn-block">Lưu</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- /Edit Details Modal -->

					</div>


				</div>
				<!-- /Personal Details -->

			</div>
			<!-- /Personal Details Tab -->

			<!-- Change Password Tab -->
			<div id="password_tab" class="tab-pane fade">

				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Đổi mật khẩu</h5>
						<div class="row">
							<div class="col-md-10 col-lg-6">
								<form method="POST" action="{{route('update-password')}}">
									@csrf
									@method("PUT")
									<div class="form-group">
										<label>Mật khẩu cũ</label>
										<input type="password" name="old_password" class="form-control">
									</div>
									<div class="form-group">
										<label>Mật khẩu Mới</label>
										<input type="password" name="password" class="form-control">
									</div>
									<div class="form-group">
										<label>Xác nhận mật khẩu</label>
										<input type="password" name="password_confirmation" class="form-control">
									</div>
									<button class="btn btn-primary" type="submit">Lưu</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Change Password Tab -->

		</div>
	</div>
</div>
@endsection

@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush


