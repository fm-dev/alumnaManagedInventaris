@extends('partials.app')
@section('content')  <!-- Bagian konten spesifik halaman -->
        <div class="row">
          <div class="col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row">
					<div>
						<div class="breadcrumb-title pe-1 fw-bold">Inventaris Data</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item "><a href="javascript:;"><i class="bx bx-home-alt "></i></a>
									</li>
									<li class="breadcrumb-item active text-white" aria-current="page">Monitoring Inventaris</li>
								</ol>
							</nav>
						</div>
					</div>
					<div>
						
					</div>
					<div class= "d-flex flex-row mt-2 gap-2">
						<a class = "btn btn-success">Download Rekap excel</a>
					</div>
                  <div class="table-responsive mt-3">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nama Inventaris</th>
										<th>Jenis Kategori</th>
										<th>Jumlah Inventaris</th>
										<th>Created by</th>
										<th>Created date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($inventarises as $key => $inventaris)
									<tr>
										<td>{{ $inventaris->nama_barang }}</td>
										<td>{{ $inventaris->category_name }}</td>
										<td>{{ $inventaris->jumlah_barang }}</td>
										<td>{{ $inventaris->created_by }}</td>
										<td>{{ $inventaris->created_at }}</td>
										<td>

										</td>
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