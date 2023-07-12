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
            <form  method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row fluid">
                <div class="col-2">
                  <label for="no_inv" class="form-label">No Inventaris</label> 
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

              <div class="form-group row fluid">
                <div class="col-4">
                  <label for="nama" class="form-label">Nama Barang</label> 
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
                <div class="col-4">
                  <label for="spesifikasi" class="form-label">Spesifikasi</label> 
                  <input id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi" type="text" class="form-control">
                </div>
                <div class="col-4">
                  <label for="jmhbarang" class="form-label"> Jumlah Barang</label> 
                  <input id="jmhbarang" name="jumlah" placeholder="Jumlah Barang" type="number" class="form-control">
                </div>
              </div>

                <div class="form-group row">
                  <div class="col-4">
                    <label for="area" class="form-label">Area</label> 
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

                  <div class="col-4">
                    <label for="lokasi" class="form-label">Lokasi</label> 
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

                  <div class="col-4">
                    <label for="kategori" class="form-label">kategori</label>
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
                  <div class="col-5">
                    <label for="kategori" class="form-label">Kondisi</label> 
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
                  <div class="col-7">
                    <label for="foto" class="form-label">Foto</label> 
                    <input id="foto" name="foto"  type="file" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-12">
                    <label for="keterangan" class="form-label">Keterangan</label> 
                    <textarea id="keterangan" name="keterangan" cols="20" rows="3" class="form-control"></textarea>
                  </div>
                </div> 
                <button name="submit" type="submit" class="btn btn-primary  mx-auto">Submit</button>
              </form>
          
    </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection