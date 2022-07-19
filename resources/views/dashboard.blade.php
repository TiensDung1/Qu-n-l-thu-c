@extends('layouts.app')

@push('page-css')
@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Chào mừng {{auth()->user()->name}}!</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item active">Bảng điều khiển</li>
	</ul>
</div>
@endpush

@section('content')

	<div class="row">
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-primary border-primary">
							<i class="fe fe-money"></i>
						</span>
						<div class="dash-count">
							<h3>{{AppSettings::get('app_currency', '$')}} {{$today_sales}}</h3>
						</div>
					</div>
					<div class="dash-widget-info">
						<h6 class="text-muted">Tiền bán hàng hôm nay</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-primary w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-success">
							<i class="fe fe-credit-card"></i>
						</span>
						<div class="dash-count">
							<h3>{{$total_categories}}</h3>
						</div>
					</div>
					<div class="dash-widget-info">

						<h6 class="text-muted">Danh mục thuốc</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-success w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-danger border-danger">
							<i class="fe fe-folder"></i>
						</span>
						<div class="dash-count">
							<h3>{{$total_expired_products}}</h3>
						</div>
					</div>
					<div class="dash-widget-info">

						<h6 class="text-muted">Thuốc hết hạn</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-danger w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="dash-widget-header">
						<span class="dash-widget-icon text-warning border-warning">
							<i class="fe fe-users"></i>
						</span>
						<div class="dash-count">
							<h3>{{\DB::table('users')->count()}}</h3>
						</div>
					</div>
					<div class="dash-widget-info">

						<h6 class="text-muted">Người dùng hệ thống</h6>
						<div class="progress progress-sm">
							<div class="progress-bar bg-warning w-50"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-6">

			<div class="card card-table">
				<div class="card-header">
					<h4 class="card-title ">Bán hàng hôm nay</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-hover table-center mb-0">
							<thead>
								<tr>
									<th>Dược phẩm</th>
									<th>Số lượng</th>
									<th>Tổng giá</th>
									<th>Ngày</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($latest_sales as $sale)
									@if(!empty($sale->product->purchase))
										<tr>
											<td>{{$sale->product->purchase->name}}</td>
											<td>{{$sale->quantity}}</td>
											<td>
												{{AppSettings::get('app_currency', '$')}} {{($sale->total_price)}}
											</td>
											<td>{{date_format(date_create($sale->created_at),"d M, Y")}}</td>

										</tr>
									@endif
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-12 col-lg-6">

			<!-- Pie Chart -->
			<div class="card card-chart">
				<div class="card-header">
					<h4 class="card-title">Tổng tài nguyên</h4>
				</div>
				<div class="card-body">
					<div style="width:65%;">
						{!! $pieChart->render() !!}
					</div>
				</div>
			</div>
			<!-- /Pie Chart -->

		</div>


	</div>
	<div class="row">
		<div class="col-md-12">

			<!-- Latest Customers -->

			<!-- /Latest Customers -->

		</div>
	</div>
@endsection

@push('page-js')

@endpush

