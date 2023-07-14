@extends('layouts/contentNavbarLayout')

@section('title', 'data')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hitung/</span>Backpropagation</h4>

<?php $list = Session::get('list'); ?>

<!-- Basic Layout -->
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Hitung Backpropagation</h5> <small class="text-muted float-end">Merged input group</small>
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
            <form action="hitungbackpro" method="POST">
            @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Usia</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-plus"></i></span>
                    <input type="number" step="any" name="usiabackpro" class="form-control"placeholder="Masukan Usia anda" />
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Berat Badan</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-body"></i></span>
                    <input type="number" step="any" name="beratbackpro" class="form-control" placeholder="Masukan Berat Badan anda"/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Tinggi Badan</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-group"></i></span>
                    <input type="number" step="any" name="tinggibackpro" class="form-control" placeholder="Masukan Tinggi Badan anda"/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">IMT Anda</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-repost"></i></span>
                    <input type="number" step="any" name="imtbackpro" class="form-control" placeholder="Masukan IMT anda"/>
                  </div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-3 m-auto">
                @if(session('message'))
                <div class="alert alert-warning">
                    <div class="text-center">{{session('message')}}</div>
                </div>
                @endif
            </div>
        </div> --}}
    </div>
    <!-- Responsive Table -->
    <!-- Bordered Table -->
  {{-- <div class="card">
    <h5 class="card-header">Pengaktifan Bobot ( Aktivasi Sigmoid)</h5>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Yk</th>
              <th>Nilai</th>    
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Z1</td>
              <td>{{(session('z1'))}}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Z2</td>
                <td>{{session('z2')}}</td>
              </tr>
            <tr>
              <td>3</td>
              	<td>Z3</td>	
                <td>{{session('z3')}}</td>
            </tr>
            <tr>
                <td>4</td>	
                <td>Z4</td>
                <td>{{session('z4')}}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Z5</td>
                <td>{{session('z5')}}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Z6</td>
                <td>{{session('z6')}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> --}}

  {{-- <div class="card">
    <h5 class="card-header">Aktivasi Sigmoid</h5>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Yk</th>
              <th>Nilai</th>    
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Gizi Buruk</td>
              <td>{{(session('ng'))}}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Gizi Kurang</td>
                <td>{{session('ngk')}}</td>
              </tr>
            <tr>
              <td>3</td>
              	<td>Gizi Baik</td>	
                <td>{{session('ngb')}}</td>
            </tr>
            <tr>
                <td>4</td>	
                <td>Beresiko Gizi Lebih</td>
                <td>{{session('ngz')}}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Gizi Lebih</td>
                <td>{{session('ngl')}}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Obesitas</td>
                <td>{{session('ngo')}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> --}}

  <div class="card">
    <h5 class="card-header">Pengaktifan Bobot (Aktivasi Sigmoid)</h5>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Yk</th>
              <th>Nilai</th>    
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Gizi Buruk</td>
              <td>{{(session('ngas'))}}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Gizi Kurang</td>
                <td>{{session('ngkas')}}</td>
              </tr>
            <tr>
              <td>3</td>
              	<td>Gizi Baik</td>	
                <td>{{session('ngbas')}}</td>
            </tr>
            <tr>
                <td>4</td>	
                <td>Beresiko Gizi Lebih</td>
                <td>{{session('ngzas')}}</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Gizi Lebih</td>
                <td>{{session('nglas')}}</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Obesitas</td>
                <td>{{session('ngoas')}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@if(session('ngas') >= 0.956 && session('ngas') <= 0.96)
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Buruk</h4>
@elseif(session('ngas') >= 0.930 && session('ngas') <= 0.941)
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Kurang</h4>
@elseif(session('ngas') >= 0.847 && session('ngas') <= 0.876)
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Baik</h4>
@elseif(session('ngas') >= 0.930 && session('ngas') <= 0.952)
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Beresiko Gizi Lebih</h4>
@elseif(session('ngas') >= 0.950 && session('ngas') <= 0.963)
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Lebih</h4>
@elseif(session('ngas') >= 0.932 && session('ngas') <= 0.947)
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Obesitas</h4>
@endif

{{-- @foreach ($databackpro as $row)
@if($row->bpr >= 1&& $row->bpr < 2)
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Buruk</h4>
@elseif ($row->bpr >= 2 && $row->bpr < 3)    
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil Gizi anda adalah </span>Gizi Kurang</h4>
@endif
@endforeach --}}

{{-- @foreach ($databackpro as $row)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->kelamin}}</td>
                <td>{{$row->namaortu}}</td>
                <td>{{$row->age}}</td>
                <td>{{$row->berat}}</td>
                <td>{{$row->tinggi}}</td>
                <td>{{$row->imt}}</td>
                <td>{{$row->bp}}</td>
                <td>{{$row->penilaian}}</td>
              </tr>
@endforeach --}}

@endsection
