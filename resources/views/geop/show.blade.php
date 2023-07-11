@extends('adminlte.layouts.app')
@section('title', 'Detail Barang')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('geop.index')}}">Gedung Operasional</a></li>
              <li class="breadcrumb-item active">Detail Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    @foreach ( $ar_barang as $b )
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        @php
                            if(!empty($b->foto)){
                            @endphp
                            <img src="{{ asset('images')}}/{{ $b->foto }}" width="350" class="card-img-top img-fluid"/>
                            @php
                            }else{
                            @endphp
                            <img src="{{ asset('images')}}/nophoto.png" width="350"
                            class="card-img-top img-fluid"/>
                            @php
                            }
                            @endphp
                        {{-- <img src="{{ asset('images')}}/{{ $b->foto }}" alt="Admin" class="rounded-circle img-fluid" width="350"> --}}
                        <!-- <img src="img.jpg" alt="Admin" class="rounded-circle" width="150"> -->
                        {{-- <div class="mt-3">
                        <h4></h4>
                        </div> --}}
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                          <h6 class="mb-0">No Inventaris</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                              {{ $b->no_inv }}
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Nama</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $b->nama }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                          <h6 class="mb-0">Kode Area</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                              {{ $b->kodearea }}
                          </div>
                      </div>
                      <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Area</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $b->are }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Kode Lokasi</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $b->kolok }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Lokasi</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $b->lok }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Kategori</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $b->kat }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Jumlah</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $b->jumlah }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Kondisi</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $b->kon }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Keterangan</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                               {{ $b->keterangan }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                 
                </div>
             
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection