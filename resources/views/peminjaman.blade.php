<table >
    <thead>
        <tr>
            <th style="text-align: center"><b>no</b></th>
            <th style="text-align: center"><b>nis</b></th>
            <th style="text-align: center" colspan="3"><b>nama peminjam</b></th>
            <th style="text-align: center"><b>id buku</b></th>
            <th style="text-align: center" colspan="3"><b>nama buku</b></th>
            <th style="text-align: center" colspan="3"><b>tanggal peminjaman</b></th>
        </tr>
    </thead>
    <tbody>

        @foreach($data as $no => $q)
        <tr>
            <td style="text-align: center">{{++$no}}</td>
            <td style="text-align: center">{{$q->nis}}</td>
            <td style="text-align: center" colspan="3">{{$q->nama}}</td>
            <td style="text-align: center">{{$q->id_buku}}</td>
            <td style="text-align: center" colspan="3">{{$q->nama_buku}}</td>
            <td style="text-align: center" colspan="3">{{$q->tanggal_peminjaman}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
