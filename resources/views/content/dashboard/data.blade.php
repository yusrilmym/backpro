@extends('layouts/contentNavbarLayout')

@section('title', 'data')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data/</span>Perhitungan</h4>



<!-- Basic Layout -->
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Data Normalisasi</h5> <small class="text-muted float-end">Merged input group</small>
          </div>
          <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="datanormalisasi" method="POST">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">NIK</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-number" class="input-group-text"><i class="bx bx-id-card"></i></span>
                    <input type="number" name="nik" class="form-control" placeholder="Masukan NIK anda" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Masukan Nama anda" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <div class="form-check mt-3">
                      <input name="kelamin" class="form-check-input" type="radio" value="l" id="defaultRadio1" />
                      <label class="form-check-label" for="defaultRadio1">
                        Laki - Laki
                      </label>
                    </div>
                    <div class="input-group input-group-merge">
                    </div>
                    <div class="form-check mt-3">
                      <input name="kelamin" class="form-check-input" type="radio" value="p" id="defaultRadio1" />
                      <label class="form-check-label" for="defaultRadio1">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-group"></i></span>
                    <input type="date" name="tanggallahir" data-date-format="DD MMMM YYYY" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Orang tua</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-group"></i></span>
                    <input type="text" name="namaortu" class="form-control" placeholder="Masukan Nama Orang Tua" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Usia</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-plus"></i></span>
                    <input type="number" name="age" class="form-control"placeholder="Masukan Usia (bulan)" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Berat Badan</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-body"></i></span>
                    <input type="number" name="berat" step="0.1" class="form-control" placeholder="Masukan Berat Badan (kg)"/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tinggi Badan</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-group"></i></span>
                    <input type="number" name="tinggi" step="0.1" class="form-control" placeholder="Masukan Tinggi Badan (cm)"/>
                  </div>
                </div>
              </div>
              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">IMT Anda</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-repost"></i></span>
                    <input type="number" step="0.1" name="imt" class="form-control" placeholder="Masukan IMT anda"/>
                  </div>
                </div>
              </div> --}}
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card mb-4">
        @if(Session::get('ngas') >= 0.561 && Session::get('ngas') <= 0.603)
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Buruk</h4>
        @elseif(Session::get('ngas') >= 0.604 && Session::get('ngas') <= 0.646)
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Kurang</h4>
        @elseif(Session::get('ngas') >= 0.647 && Session::get('ngas') <= 0.689)
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Baik</h4>
        @elseif(Session::get('ngas') >= 0.69 && Session::get('ngas') <= 0.732)
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Beresiko Gizi Lebih</h4>
        @elseif(Session::get('ngas') >= 0.733 && Session::get('ngas') <= 0.775)
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Lebih</h4>
        @elseif(Session::get('ngas') >= 0.776 && Session::get('ngas') <= 0.819)
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Obesitas</h4>
        @endif

    </div>
  </div>
  <!-- <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Hitung IMT</h5> <small class="text-muted float-end">Default label</small>
      </div>
      <div class="card-body">
        <form action="calculation" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label">Berat Badan</label>
            <input type="number" step="0.1" class="form-control" name="beratnumber" placeholder="Masukan Berat Badan Anda" />
          </div>
          <div class="mb-3">
            <label class="form-label">Tinggi Badan</label>
            <input type="number" step="0.1" class="form-control" name="tingginumber" placeholder="Masukan Tinggi Badan Anda" />
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    <div class="row">
        <div class="col-md-3 m-auto">
            @if(session('message'))
            <div class="alert alert-warning">
                <div class="text-center">{{session('message')}}</div>
            </div>
            @endif
        </div>
    </div> -->


              </div>
    <!-- Responsive Table -->
<div class="card">
    <h5 class="card-header">Data Training Hasil Normalisasi</h5>
    <div class="navbar-nav align-items-center">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search...">
          </div>
        </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>#</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Nama Orang Tua</th>
            <th>Usia</th>
            <th>Berat Badan</th>
            <th>Tinggi Badan</th>
            <th>IMT</th>
            <th>BP</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$row->nik}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->kelamin}}</td>
                <td>{{date('j F Y', strtotime($row->tanggallahir))}}</td>
                <td>{{$row->namaortu}}</td>
                <td>{{$row->age}}</td>
                <td>{{$row->berat}} kg</td>
                <td>{{$row->tinggi}} cm</td>
                <td>{{$row->imt}} kg/m2</td>
                <td>{{$row->hasil}}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
