@extends('layouts.app')

@push('page-css')
	<!-- Select2 css-->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Nhà cung cấp</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng điều khiển</a></li>
		<li class="breadcrumb-item active">Nhà cung cấp</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="{{route('add-supplier')}}" class="btn btn-primary float-right mt-2">Thêm mới</a>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">

		<!-- Suppliers -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>tên</th>
								<th>SĐT</th>
								<th>Email</th>
								<th>Địa chỉ</th>
								<th>Công ty</th>
								<th class="action-btn">Hành động</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($suppliers as $supplier)
							<tr>
								<td>
									{{$supplier->product}}
								</td>
								<td>{{$supplier->name}}</td>
								<td>{{$supplier->phone}}</td>
								<td>{{$supplier->email}}</td>
								<td>{{$supplier->address}}</td>
								<td>{{$supplier->company}}</td>
								<td>
									<div class="actions">
										<a class="btn btn-sm bg-success-light" href="{{route('edit-supplier',$supplier)}}">
											<i class="fe fe-pencil"></i> Sửa
										</a>
										<a data-id="{{$supplier->id}}" href="javascript:void(0);" class="btn btn-sm bg-danger-light deletebtn" data-toggle="modal">
											<i class="fe fe-trash"></i> Xóa
										</a>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Suppliers-->

	</div>
</div>
<!-- Delete Modal -->
<x-modals.delete :route="'suppliers'" :title="'Supplier'" />
<!-- /Delete Modal -->
@endsection

@push('page-js')
	<!-- Select2 js-->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush

