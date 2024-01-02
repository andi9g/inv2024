@extends('layouts.admin')

@section("warnakeluar", "bg-primary")

@section("judul", "Kelola Barang Keluar")


@section('content')
   
    <div class="container">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-5">
                  <h3 class="my-0 py-0">
                     Data Barang
                  </h3>
               </div>
               <div class="col-md-7">
                  <form action="{{ url()->current() }}">
                     <div class="row">
                        <div class="col-md-5">
                           
                        </div>

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
                     <th>Aksi</th>
                  </tr>
               </thead>

               <tbody>
                  @foreach ($data as $item)
                      <tr>
                        <td>{{ $loop->iteration + $data->firstItem() - 1 }}</td>
                        <td>{{ $item->namaitem }}</td>
                        <td>Rp{{ number_format($item->hargaitem, 0, ",", ".")}}</td>
                        <td>{{ $item->stok." ".$item->satuan->satuan}}</td>
                        <td width="20px">
                           <button class="badge py-2 px-4 badge-btn text-bold border-0 badge-success" type="button" data-toggle="modal" data-target="#ubahstok{{ $item->iditem }}">
                              KELOLA STOK
                           </button>
                        </td>

                        
                      </tr>

                      <div id="ubahitem{{ $item->iditem }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="my-modal-title">UBAH DATA BARANG</h5>
                                 <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form action="{{ route('item.update', [$item->iditem]) }}" method="POST">
                                 @csrf
                                 @method("PUT")
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label for="namabarang">Nama Barang</label>
                                       <input id="namabarang" class="form-control" type="text" name="namaitem" placeholder="masukan nama barang" value="{{ $item->namaitem }}">
                                    </div>
                     
                                    <div class="form-group">
                                       <label for="hargabarang">Harga Barang</label>
                                       <input id="hargabarang" class="form-control" type="number" name="hargaitem" placeholder="harga barang" value="{{ $item->hargaitem }}">
                                    </div>
                     
                                    <div class="form-group">
                                       <label for="stok">Jumlah Barang</label>
                                       <div class="row">
                                          <div class="col-md-6">
                                             <input id="stok" class="form-control" type="number" name="stok" placeholder="Jumlah" value="{{ $item->stok }}">
                                          </div>
                                          <div class="col-md-6">
                                             <select id="satuan" class="form-control" name="idsatuan">
                                                @foreach ($datasatuan as $ds)
                                                      <option value="{{ $ds->idsatuan }}" @if ($ds->satuan == $item->idsatuan)
                                                         selected
                                                      @endif>{{ $ds->satuan }}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       
                                    </div>
                     
                     
                                    <div class="form-group">
                                       <label for="idketerangan">Keterangan</label>
                                       <select id="idketerangan" class="form-control" readonly disabled name="idketerangan">
                                          @foreach ($dataketerangan as $dk)
                                              <option value="{{ $dk->idketerangan }}">{{ ucwords($dk->keterangan) }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                     
                     
                                 </div>
                                 <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">
                                       UBAH data
                                    </button>
                                 </div>
                              </form>
                           </div>
                        </div>
                      </div>
                      <div id="ubahstok{{ $item->iditem }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header bg-success">
                                 <h5 class="modal-title" id="my-modal-title">KELOLA STOK</h5>
                                 <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form action="{{ route('ubah.stok', [$item->iditem]) }}" method="POST">
                                 @csrf
                                 <div class="modal-body">
                                    <input type="text" name="iditem" value="{{ $item->iditem }}" hidden id="">
                                    <input type="number" name="hargaitem" value="{{ $item->hargaitem }}" hidden id="">
   
                                    <div class="form-group">
                                       <label for="nama">Nama Barang</label>
                                       <input id="nama" class="form-control" type="text" value="{{ $item->namaitem }}" disabled>
                                    </div>
   
                                    <div class="form-group">
                                       <label for="stok">Jumlah Barang</label>
                                       <input id="stok" class="form-control" type="number" name="stok" value="1">
                                    </div>
   
                                    <div class="form-group">
                                       <label for="tanggal">Tanggal</label>
                                       <input id="tanggal" class="form-control" type="date" name="tanggal" value="{{ date('Y-m-d') }}">
                                    </div>
   
   
                                    <div class="form-group">
                                       <label for="idketerangan">Keterangan</label>
                                       <select id="idketerangan" required class="form-control" name="idketerangan">
                                          <option value="">-- Pilih --</option>
                                          @foreach ($dataketerangan as $dk)
                                             @if ($dk->idketerangan != 1)
                                             <option value="{{ $dk->idketerangan }}" @if ($dk->idketerangan == $item->idketerangan)
                                                 selected
                                             @endif>{{ ucwords($dk->keterangan )}}</option>
                                                 
                                             @endif
                                          @endforeach
                                       </select>
                                    </div>
   
                                 </div>
                                 <div class="modal-footer bg-light">
                                    <button type="submit" class="btn btn-success text-bold px-3">
                                       KELOLA STOK
                                    </button>
                                 </div>

                              </form>
                           </div>
                        </div>
                      </div>
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