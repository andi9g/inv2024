<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>LAPORAN PENDAPATAN</title>
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
      p {
         margin: 0 auto;
         padding-top: 0;
         padding-bottom: 5px;
      }
   </style>
</head>
<body>
   <h2>LAPORAN DATA EXPIRED</h2>
   <p>
      <i>

         {{ $tanggalawal->isoFormat("dddd, DD MMMM Y") }} s/d {{ $tanggalakhir->isoFormat("dddd, DD MMMM Y") }}
      </i>
   </p>

   <table width="100%" border="1">
      <thead>
         <tr>
            <th width="5px">No</th>
            <th width="20px">Tanggal</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
         </tr>
      </thead>

      <tbody>
         @foreach ($data as $item)
         <tr>
            <td align="center">{{ $loop->iteration }}</td>
            <td nowrap>{{ date("d/m/Y", strtotime($item->tanggal)) }}</td>
            <td>{{ $item->item->namaitem }}</td>
            <td>{{ $item->stok }}</td>
            <td>Rp{{ number_format($item->hargaitem, 0, ",", ".") }}</td>
            <td>Rp{{ number_format($item->total, 0, ",", ".") }}</td>
         </tr>
             
         @endforeach
      </tbody>

      <tfoot>
         <tr>
            <th colspan="3">JUMLAH KESELURUHAN</th>
            <th colspan="3">{{ $data->sum("stok") }}</th>
         </tr>
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

</body>
</html>