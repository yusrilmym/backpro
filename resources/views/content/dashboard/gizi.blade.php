@extends('layouts/contentNavbarLayout')

@section('title', 'data')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data/</span>Perhitungan</h4>



<!-- Basic Layout -->
<div class="row">
  <div class="col-xxl">
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
    </div>
  </div>
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Hitung Normalisasi</h5> <small class="text-muted float-end">Merged input group</small>
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
                    <input type="number" name="age" class="form-control"placeholder="Masukan Usia anda" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Berat Badan</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-body"></i></span>
                    <input type="number" name="berat" step="0.1" class="form-control" placeholder="Masukan Berat Badan anda"/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tinggi Badan</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-group"></i></span>
                    <input type="number" name="tinggi" step="0.1" class="form-control" placeholder="Masukan Tinggi Badan anda"/>
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
    </div>
    <!-- Responsive Table -->

    
@endsection
