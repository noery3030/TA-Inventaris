@php
           $ar_judul = ['No','Area','Lokasi','No Inventaris','Nama Aset','Spesifikasi','Kategori','Jumlah','Kondisi', 'keterangan','Detail'];
          $no = 1;
@endphp

@extends('adminlte.layouts.app')
@section('title', 'Gedung Operasional')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">02-Gedung Operasional</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href={{ 'home' }}>Home</a></li>
              <li class="breadcrumb-item active">Gedung Operasional</li>
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
          <h3 class="card-title">Data Barang Inventaris Area Gedung Operasional</h3> 
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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
                    <td align="center">{{ $b->kodearea }}</td>
                    <td align="center">{{ $b->lok }}</td>
                    <td align="center">{{ $b->no_inv }}</td>
                    <td align="center">{{ $b->nama }}</td>
                    <td align="center">{{ $b->spesifikasi }}</td>
                    <td align="center">{{ $b->kat }}</td>
                    <td align="center">{{ $b->jumlah }}</td>
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
                    <td class="text-center"><a class="text-secondary fw-bolder" href="{{ route('geop.show',$b->id) }}">Detail</a></td>
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
