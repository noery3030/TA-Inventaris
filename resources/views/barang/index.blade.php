@php
          $ar_judul = ['No','No Inventaris' ,'Nama','Jumlah','Area','Lokasi','Kategori','Kondisi', 'keterangan','Aksi'];
          $no = 1;
@endphp

@extends('adminlte.layouts.app')
@section('title', 'Barang')
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
              <li class="breadcrumb-item active">Barang</li>
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
          <h3 class="card-title">Data Semua Barang Inventaris</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a class="btn btn-warning mb-2" 
                href="{{ route('barang.create') }}">Tambah Data <i class="fas fa-plus"></i>
            </a>
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr align="center">
                @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($ar_barang as $b)
                <tr>
                    <td style="width: 30px" class="text-center">{{ $no++ }}</td>
                    <td align="center">{{ $b->no_inv }}</td>
                    <td>{{ $b->nama }}</td>
                    <td align="center">{{ $b->jumlah }}</td>
                    <td>{{ $b->are }}</td>
                    <td>{{ $b->lok }}</td>
                    <td>{{ $b->kat }}</td>
                    @if($b->idkondisi === 1)
                      <td class=" text-sm" align="center">
                        <span class="badge badge-sm bg-gradient-success text-sm">{{ $b->kon }}</span>
                      </td>
                    @elseif($b->idkondisi === 2)
                      <td class=" text-sm" align="center">
                        <span class="badge badge-sm bg-gradient-warning text-white text-sm">{{ $b->kon }}</span>
                      </td>
                    @else
                      <td class=" text-sm" align="center">
                          <span class="badge badge-sm bg-gradient-danger text-sm">{{ $b->kon }}</span>
                      </td>
                      @endif
                    <td>{{ $b->keterangan }}</td>
                    <td style="width:150px" align="center">
                        <form method="POST" action="{{ route('barang.destroy', $b->id) }}">
                            @csrf {{--security unutk menghindari dari serangan pada saat input form--}}
                            @method('delete')
                            <a class="btn btn-info" 
                            href="{{ route('barang.show',$b->id) }}"><i class="fas fa-info-circle"></i>
                            </a>
                            <a class="btn btn-success" 
                            href="{{ route('barang.edit',$b->id) }}"><i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data Dihapus?')"> <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
