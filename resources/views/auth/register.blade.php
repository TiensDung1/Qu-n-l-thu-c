@extends('layouts.auth')

@section('content')
<h1>Đăng ký</h1>
<p class="account-subtitle">Truy cập vào trang tổng quan của chúng tôi</p>

<!-- Form -->
<form action="{{route('register')}}" method="POST">
	@csrf
	<div class="form-group">
		<input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="Họ và tên">
	</div>
	<div class="form-group">
		<input class="form-control" name="email" type="text" value="{{old('email')}}" placeholder="Email">
	</div>
	<div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Mật khẩu">
	</div>
	<div class="form-group">
		<input class="form-control" name="password_confirmation" type="password" placeholder="Xác nhận mật khẩu">
	</div>
	<div class="form-group mb-0">
		<button class="btn btn-primary btn-block" type="submit">Đăng ký</button>
	</div>
</form>
<!-- /Form -->

<div class="text-center dont-have">Bạn có sẵn sàng để tạo một tài khoản?<a href="{{route('login')}}">Đăng nhập</a></div>
@endsection


