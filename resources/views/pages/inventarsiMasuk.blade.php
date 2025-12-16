@extends('partials.app')
@section('content')  <!-- Bagian konten spesifik halaman -->
        <div class="row">
          <div class="col-xxl-12 d-flex align-items-stretch">
            <div class="card w-100  rounded-4">
              <div class="card-body position-relative p-4">
                <div class="row">
                  			<div class="page-breadcrumb  d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Inventaris Data</div>
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
                        <form method="POST" action="/Inventaris/add">
                            @csrf
                            <div class="form-group">
                                <label for="namaBarang">Nama Barang</label>
                                <input name="nama_barang" type="text" class="form-control" id="namaBarang" placeholder="Nama Barang">
                            </div>
                            <div class="form-group mt-2">
                                <label for="single-select-clear-field" class="form-label">Jenis Kategori</label>
									 <select class="form-select" id="single-select-clear-field" data-placeholder="Choose one thing" name="kategori_id">
										 @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                         @endforeach
										 
									 </select>
								 </div>
                            </div>
                            <div class="form-group">
                                <label for="namaBarang">Jumlah Barang</label>
                                <input name="jumlah_barang" type="number" class="form-control" id="namaBarang" >
                            </div>
                            <button type="submit" class="btn btn-grd btn-grd-success px-5 mt-3">Simpan Inventaris</button>
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