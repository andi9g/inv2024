@extends('layouts.admin')

@section("warnahabis", "bg-primary")

@section("judul", "Data Barang Keluar")


@section('content')
   <div id="cetakdata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="my-modal-title">Cetak Laporan Pendapatan</h5>
               <button class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="{{ route('cetak.habis', []) }}" target="_blank" method="GET">
               @csrf
               <div class="modal-body">
                  <div class="form-group">
                     <label for="TANGGALAWAL">Tanggal Awal</label>
                     <input id="TANGGALAWAL" required class="form-control" type="date" name="tanggalawal" value="{{ date('Y-m-d') }}">
                  </div>
   
                  <div class="form-group">
                     <label for="tanggalakhir">Tanggal Akhir</label>
                     <input id="tanggalakhir" required class="form-control" type="date" name="tanggalakhir" value="{{ date('Y-m-d') }}">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary">CETAK LAPORAN</button>
               </div>
            </form>
         </div>
      </div>
   </div>

    <div class="container">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <button class="btn btn-secondary text-bold" type="button" data-toggle="modal" data-target="#cetakdata">
                     <i class="fa fa-print"></i>
                     CETAK LAPORAN PENDAPATAN</button>
               </div>
               <div class="col-md-7">
                  <form action="{{ url()->current() }}">
                     <div class="row">
                        <div class="col-md-5"></div>

                        <div class="col-md-7">
                           <div class="input-group">
                              <input class="form-control" type="text" name="keyword" placeholder="masukan nama barang" aria-label="keyword" aria-describedby="keyword" value="{{ $keyword }}">
                              <div class="input-group-append">
                                 <button type="submit" class="input-group-text bg-secondary" id="keyword">
                                    <i class="fa fa-search"></i> Cari
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>

               </div>
            </div>
         </div>
         
      </div>


      <div class="card">
         <div class="card-body">
            <table class="table table-hover table-striped table-sm text-md">
               <thead>
                  <tr>
                     <th width="5px">No</th>
                     <th>Nama Barang</th>
                     <th>Harga</th>
                     <th>Stok</th>
                     <th>Tanggal</th>
                  </tr>
               </thead>

               <tbody>
                  @foreach ($data as $item)
                      <tr>
                        <td>{{ $loop->iteration + $data->firstItem() - 1 }}</td>
                        <td>{{ $item->item->namaitem }}</td>
                        <td>Rp{{ number_format($item->hargaitem, 0, ",", ".")}}</td>
                        <td>{{ $item->stok }}</td>
                        <td>
                           {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat("dddd, DD MMMM Y") }}
                        </td>
                        
                      </tr>

                     
                  @endforeach
               </tbody>
            </table>
         </div>
         <div class="card-footer">
            {{ $data->links("vendor.pagination.bootstrap-4") }}
         </div>
      </div>
    </div>
@endsection