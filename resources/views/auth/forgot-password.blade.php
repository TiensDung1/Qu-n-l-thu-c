@extends('layouts.auth')

@section('content')
<h1>Quên mật khẩu?</h1>
<p class="account-subtitle">Nhập email của bạn để nhận liên kết đặt lại mật khẩu</p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Form -->
<form action="{{route('forgot-password')}}" method="post">
	@csrf
	<div class="form-group">
		<input class="form-control" name="email" type="text" placeholder="Email">
	</div>
	<div class="form-group mb-0">
		<button class="btn btn-primary btn-block" type="submit">Đặt lại mật khẩu</button>
	</div>
</form>
<!-- /Form -->

<div class="text-center dont-have">Nhớ mật khẩu của bạn? <a href="{{route('login')}}">Đăng nhập</a></div>
@endsection
