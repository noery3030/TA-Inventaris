@php
          $ar_judul = ['No', 'Nama', 'Merek', 'Kategori','kondisi', 'keterangan'];
          $no = 1;
          $no1 = 1;
@endphp

@extends('adminlte.layouts.app')
@section('title', 'Dashboard')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info ">
              <div class="inner">
                <h3 class="text-white">{{ $totalBarangPosSecurity }}</h3>

                <p class="text-lg font-weight-bold">Pos Security</p>
              </div>
              <div class="icon">
                <i class="fas fa-dungeon" style="color: #ffffff;"></i>
              </div>
              <a href="{{ route('pos.index')}}" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right" style="color: #ffffff"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalBarangMasjid }}</h3>

                <p class="text-lg font-weight-bold"> Masjid</p>
              </div>
              <div class="icon">
                <i class="fas fa-mosque" style="color: #ffffff;"></i>
              </div>
              <a href="{{ route('masjid.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalBarangGO }}</h3>

                <p class="text-lg font-weight-bold">Gedung Operasional</p>
              </div>
              <div class="icon">
                <i class="fas fa-university" style="color: #ffffff;"></i> 
              </div>
              <a href="{{ route('geop.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalBarangGA }}</h3>

                <p class="text-lg font-weight-bold">Gedung Asrama</p>
              </div>
              <div class="icon">
                <i class="fas fa-building" style="color: #ffffff;"></i>
              </div>
              <a href="{{ route('geas.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalBarangFO }}</h3>

                <p class="text-lg font-weight-bold">Fasilitas Olahraga</p>
              </div>
              <div class="icon">
                <i class="fas fa-volleyball-ball" style="color: #ffffff;"></i> 
              </div>
              <a href="{{ route('fo.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalBarangTaman }}</h3>

                <p class="text-lg font-weight-bold">Taman</p>
              </div>
              <div class="icon">
                <i  class="fas fa-chair" style="color: #ffffff;"></i> 
              </div>
              <a href="{{ route('taman.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        <!-- /.row -->
        </div>
      <div class="row">
          <div class="col-md-6 col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-lg font-weight-bold">Info Lokasi</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">NO</th>
                        <th>Lokasi</th>
                        <th>Kode Lokasi</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($ar_lokasi as $l)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $l->lokasi }}</td>
                        <td align="center">{{ $l->kode_lok }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>

          <div class="col-md-6 col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-lg font-weight-bold">Info Area</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">NO</th>
                        <th>Area</th>
                        <th>Kode Area</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($ar_area as $a)
                      <tr>
                        <td>{{ $no1++ }}</td>
                        <td>{{ $a->area }}</td>
                        <td align="center">{{ $a->kode_area }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>  

            <!-- /.card-body -->
            
          <!-- /.card -->

          
          <!-- /.card -->
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
