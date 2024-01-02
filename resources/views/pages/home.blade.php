@extends('layouts.admin')

@section("warnadashboard", "bg-primary")

@section("judul", "Data Barang Keluar")


@section('content')
  <div class="container">
   <div class="row">
    <div class="col-lg-4 col-6">

        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $item }}</h3>
                <p>Data Barang</p>
            </div>
            <div class="icon">
                <i class="fa fa-database"></i>
            </div>
            <a href="{{ url('item', []) }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-6">

      <div class="small-box bg-secondary">
          <div class="inner">
              <h3>{{ $itemhabis }}</h3>
              <p>Data Barang Keluar</p>
          </div>
          <div class="icon">
              <i class="fa fa-times"></i>
          </div>
          <a href="{{ url('habis', []) }}" class="small-box-footer">More info
              <i class="fas fa-arrow-circle-right"></i>
          </a>
      </div>
   </div>
    <div class="col-lg-4 col-6">

      <div class="small-box bg-secondary">
          <div class="inner">
              <h3>{{ $itemexpired }}</h3>
              <p>Data Barang Keluar</p>
          </div>
          <div class="icon">
              <i class="ion ion-clock"></i>
          </div>
          <a href="{{ url('expired', []) }}" class="small-box-footer">More info
              <i class="fas fa-arrow-circle-right"></i>
          </a>
      </div>
   </div>
    
    

   </div>
  </div>
@endsection