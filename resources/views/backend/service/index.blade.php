@extends('backend.layouts.template')

@section('content')
<div class="section-header shadow">
  <h1>Kelola Halaman Jasa</h1>
</div>
<div class="section-body">
  <div class="viewform" style="display: none;"></div>
  <div class="card shadow">
    <div class="card-header shadow-sm">
      <div class="col-lg-6 text-left">
        <h5>Data Jasa</h5>
      </div>
      <div class="col-lg-6 text-right">
        <button class="btn btn-success showform"><i class="fa fa-plus-circle"></i> Tambah Jasa</button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-light table-bordered" id="data-jasa">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Jasa</th>
            <th>Kategori</th>
            <th>Ukuran</th>
            <th>Harga</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
@endsection