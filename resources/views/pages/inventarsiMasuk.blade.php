@extends('partials.app')
@section('content') <!-- Bagian konten spesifik halaman -->
  <form method="POST" action="/Inventaris/add">
    @csrf
    <div class="row" id="repeater">
      <div class="col-xxl-12 d-flex align-items-stretch">
        <div class="card w-100  rounded-4">
          <div class="card-body position-relative p-4">
            <div class="row">
              <div class="page-breadcrumb  d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tambah Inventaris Data</div>
                <div class="ps-3">
                  <div class="d-flex align-items-center justify-content-between gap-2">
                    <button class="btn btn-primary repeater-add-btn px-4">Add</button>
                    <button class="btn btn-success  px-4">Simpan</button>
                  </div>
                </div>
              </div>
            </div><!--end row-->
          </div>
        </div>
      </div>

      <!-- Repeater Items -->
      <div class="items" data-group="test">
        <div class="card">
          <div class="card-body">
            <!-- Repeater Content -->
            <div class="item-content">
              <div>
                <div class="form-group">
                  <label for="namaBarang">Nama Barang</label>
                  <input data-name="nama_barang" type="text" class="form-control" id="namaBarang" placeholder="Nama Barang">
                </div>
                <div class="form-group mt-2">
                  <label for="single-select-clear-field" class="form-label">Jenis Kategori</label>
                  <select class="form-select" id="single-select-clear-field" data-placeholder="Choose one thing"
                    data-name="kategori_id" >
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="namaBarang">Jumlah Barang</label>
                <input  data-name="jumlah_barang" type="number" class="form-control" id="namaBarang">
              </div>
              <!-- Repeater Remove Btn -->
              <div class="repeater-remove-btn mt-2">
                <button class="btn btn-danger remove-btn px-4">
                  Remove
                </button>
              </div>
              <!-- <button type="submit" class="btn btn-grd btn-grd-success px-5 mt-3">Simpan Inventaris</button> -->
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
  </form>

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