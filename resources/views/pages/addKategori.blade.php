@extends('partials.app')
@section('content')  <!-- Bagian konten spesifik halaman -->
        <div class="row">
          <div class="col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row">
                  			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Master Data</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
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
                        <form method="POST" action="/kategori/add/crate">
                            @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="categoryName" name="name" placeholder="Masukkan nama kategori" required>
                            </div>
                            <button type="submit" class="btn btn-grd btn-grd-success px-5">Simpan Kategori</button>
                        </form>
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
											<div class="text-white">{{ session('error') }} &#128548;</div>
										</div>
									</div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
</div>
    
@endif        
@endsection