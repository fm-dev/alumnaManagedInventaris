@extends('partials.app')
@section('content')  <!-- Bagian konten spesifik halaman -->
        <div class="row">
          <div class="col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row">
                  			<div class="page-breadcrumb  d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Master Inventaris Masuk</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Inventaris Masuk</li>
							</ol>
						</nav>
					</div>
				</div>
                </div><!--end row-->
              </div>
            </div>
          </div>
          <div class="col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row">
                    <div>
                        <a href="/Inventaris/form" class="btn btn-grd btn-grd-warning px-5">+ Tambah inventaris masuk</a>
                    </div>
                  <div class="table-responsive mt-3">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nama barang</th>
										<th>Jumlah Barang masuk</th>
										<th>Created date</th>
										<th>Created by</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                   @foreach($tambahInventarises as $key => $tambahInventaris)
									<tr>
										<td>{{ $tambahInventaris->nama_barang }}</td>
										<td>{{ $tambahInventaris->jumlah_barang }}</td>
										<td>{{ $tambahInventaris->created_at }}</td>
										<td>{{ $tambahInventaris->created_by }}</td>
										<td>61</td>
									</tr>
									@endforeach
								</tbody>
								
							</table>
						</div>
                </div><!--end row-->
              </div>
            </div>
          </div>
        </div>
        @if(session('error'))
 <div class="position-absolute top-0 end-0 p-3" style="z-index: 11">
    <div class=" alert alert-danger border-0 bg-grd-danger alert-dismissible fade show">
									<div class="d-flex align-items-center">
										<div class="font-35 text-white"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">Alerts</h6>
											<div class="text-white">{{ session('error') }} &#128548;</div>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
</div>
    
@endif
@if(session('success'))
 <div class="position-absolute top-0 end-0 p-3" style="z-index: 11">
    <div class=" alert alert-danger border-0 bg-grd-success alert-dismissible fade show">
									<div class="d-flex align-items-center">
										<div class="font-35 text-white"><span class="material-icons-outlined fs-2">report_gmailerrorred</span>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-white">success</h6>
											<div class="text-white">{{ session('success') }} &#128548;</div>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
</div>
    
@endif
@endsection