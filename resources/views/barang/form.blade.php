@extends('adminlte.layouts.app')

@php
$rs1 = App\Models\Area::all();
$rs2 = App\Models\Kategori::all();
$rs3 = App\Models\Kondisi::all();
$rs4 = App\Models\Lokasi::all();
@endphp
@section('title', 'Tambah Data')
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
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></li>
              <li class="breadcrumb-item active">Tambah Barang</li>
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
          <h3 class="card-title">Tambah Data</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label for="no_inv" class="col-1 col-form-label">No Inventaris</label> 
                <div class="col-4">
                  <input class="form-control 
                  @error('no_inv')
                  is-invalid
                  @enderror"
                  id="no_inv" name="no_inv" placeholder="No Inventaris" type="text">
                  {{-- pesan error --}}
                  @error('no_inv')
                    <div class="invalid-feedback">
                          {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
                <div class="form-group row">
                  <label for="nama" class="col-1 col-form-label">Nama Barang</label> 
                  <div class="col-4">
                    <input class="form-control
                    @error('nama')
                    is-invalid
                    @enderror"
                    id="nama" name="nama" placeholder="Nama Barang" type="text" >
                    @error('nama')
                    <div class="invalid-feedback">
                          {{ $message }}
                    </div>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="spesifikasi" class="col-1 col-form-label">Spesifikasi</label> 
                  <div class="col-4">
                    <input id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi" type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jmhbarang" class="col-1 col-form-label"> Jumlah Barang</label> 
                  <div class="col-4">
                    <input id="jmhbarang" name="jumlah" placeholder="Jumlah Barang" type="number" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="area" class="col-1 col-form-label">Area</label> 
                  <div class="col-4">
                    <select class="form-control 
                                @error('idarea')
                                is-invalid
                                @enderror" 
                                name="idarea"
                                id="idarea">
                                    <option selected disabled>Pilih Area</option>
                                    @foreach ($rs1 as $a)
                                        <option value="{{ $a->id }}"
                                            {{ old('idarea') == $a->id ? 'selected' : null }}>{{ $a->area }}
                                        </option>
                                    @endforeach
                    </select>
                    {{-- pesan error --}}
                    @error('idarea')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lokasi" class="col-1 col-form-label">Lokasi</label> 
                  <div class="col-4">
                    <select class="form-control 
                                @error('idlokasi')
                                is-invalid
                                @enderror" 
                                name="idlokasi"
                                id="idlokasi">
                                    <option selected disabled>Pilih Lokasi</option>
                                    @foreach ($rs4 as $l)
                                        <option value="{{ $l->id }}"
                                            {{ old('idlokasi') == $l->id ? 'selected' : null }}>{{ $l->lokasi }}
                                        </option>
                                    @endforeach
                    </select>
                    {{-- pesan error --}}
                    @error('idlokasi')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kategori" class="col-1 col-form-label">kategori</label> 
                  <div class="col-4">
                    <select class="form-control 
                    @error('idkategori')
                    is-invalid
                    @enderror" 
                    name="idkategori">
                        <option selected disabled>Pilih Kategori</option>
                        @foreach ($rs2 as $k)
                            <option value="{{ $k->id }}"
                                {{ old('idkategori') == $k->id ? 'selected' : null }}>{{ $k->nama }}
                            </option>
                        @endforeach
                    </select>
                    {{-- pesan error --}}
                    @error('kondisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kategori" class="col-1 col-form-label">Kondisi</label> 
                  <div class="col-4">
                    <select class="form-control 
                    @error('kondisi')
                    is-invalid
                    @enderror" 
                    name="kondisi">
                        <option selected disabled>Pilih Kondisi</option>
                        @foreach ($rs3 as $ko)
                            <option value="{{ $ko->id }}"
                                {{ old('kondisi') == $ko->id ? 'selected' : null }}>{{ $ko->kondisi }}
                            </option>
                        @endforeach
                    </select>
                    {{-- pesan error --}}
                    @error('kondisi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                  <div class="form-group row">
                    <label for="foto" class="col-1 col-form-label"> Foto</label> 
                    <div class="col-4">
                      <input id="foto" name="foto"  type="file" class="form-control">
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="keterangan" class="col-1 col-form-label">Keterangan</label> 
                  <div class="col-4">
                    <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control"></textarea>
                  </div>
                </div> 
                <div class="form-group row">
                  <div class="offset-1 col-1">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
          
    </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection