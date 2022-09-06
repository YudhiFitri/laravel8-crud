<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Pegawai</h1>

<table id="customers">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No.Telpon</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1
        @endphp
        @foreach($data as $dt)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$dt->nama}}</td>
            <td>{{$dt->jnskelamin}}</td>
            <td>0{{ $dt->notelpon }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
