<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Laporan</title>
   <style>
      table {
         border-collapse: collapse;
      }
      table tr td {
         padding: 1px 3px;
      }
      table thead {
         background: rgb(201, 201, 201);
      }
      h2 {
         margin: 0 auto;
         padding: 0 auto;
      }
      h4 {
         margin: 0 auto;
         padding: 0 auto;
      }
      p {
         margin: 0 auto;
         padding-top: 0;
         padding-bottom: 5px;
      }
   </style>
</head>
<body>
   
   <table width="100%" style="margin-bottom: 10px">
      <tr>
         <td width="50px">
            <img src="{{ url('gambar', ['logokp.jpeg']) }}" width="100%" alt="">
         </td>
         <td>
            <h2>LAPORAN KETERSEDIAAN BARANG</h2>
            <h4>KEDAI DATFIQ</h4>

         </td>
      </tr>
   </table>


   <table width="100%" border="1">
      <thead>
         <tr>
            <th width="5px">No</th>
            <th>Kode barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Total Harga</th>
         </tr>
      </thead>

      <tbody>
         @foreach ($data as $item)
         <tr>
           <td>{{ $loop->iteration }}</td>
           <td>{{ ($item->kdbarang) }}</td>
           <td>{{ $item->namaitem }}</td>
           <td>{{ $item->stok." ".$item->satuan->satuan}}</td>
           <td>Rp{{ number_format($item->hargaitem, 0, ",", ".")}}</td>
           <td>Rp{{ number_format($item->total, 0, ",", ".")}}</td>
         </tr>
         @endforeach
      </tbody>

      <tfoot>
         <tr>
            <th colspan="3">HARGA KESELURUHAN</th>
            <th colspan="3">Rp{{ number_format($data->sum("hargaitem"), 0, ",", ".") }}</th>
         </tr>
         <tr>
            <th colspan="3">TOTAL HARGA KESELURUHAN</th>
            <th colspan="3">Rp{{ number_format($data->sum("total"), 0, ",", ".") }}</th>
         </tr>
      </tfoot>
   </table>

   <br>
   <table width="100%">
      <tr>
         <td width="60%"></td>
         <td width="30%" align="center">
            <p>{{ \Carbon\Carbon::parse(date("Y-m-d"))->isoFormat("dddd, DD MMMM Y") }}</p>
            <br>
            <br>
            <br>
            <p>ADMIN</p>
         </td>
      </tr>
   </table>


</body>
</html>