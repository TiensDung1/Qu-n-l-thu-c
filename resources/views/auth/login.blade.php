@extends('layouts.auth')

@section('content')
<h1>Đăng nhập</h1>
<p class="account-subtitle">Truy cập vào trang tổng quan của chúng tôi</p>
@if (session('login_error'))
<x-alerts.danger :error="session('login_error')" />
@endif
<!-- Form -->
<form action="{{route('login')}}" method="post">
	@csrf
	<div class="form-group">
		<input class="form-control" name="email" type="text" placeholder="Email">
	</div>
	<div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Nhập mật khẩu">
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-block" type="submit">Đăng nhập</button>
	</div>
</form>
<!-- /Form -->

{{-- <div class="text-center forgotpass"><a href="{{route('forgot-password')}}">Forgot Password?</a></div> --}}

<div class="text-center dont-have">Không có tài khoản? <a href="{{route('register')}}">Đăng ký</a></div>
@endsection

