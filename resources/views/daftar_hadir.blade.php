<thead>
    <tr>
        <th style="text-align: center"><b>no</b></th>
        <th style="text-align: center"><b>nis</b></th>
        <th style="text-align: center"><b>nama</b></th>
        <th style="text-align: center"><b>kelas</b></th>
        <th style="text-align: center" colspan="2"><b>tanggal masuk</b></th>
    </tr>
</thead>
<tbody>

    @foreach($data as $no => $q)
    <tr>
        <td style="text-align: center">{{++$no}}</td>
        <td style="text-align: center">{{$q->nis}}</td>
        <td style="text-align: center">{{$q->nama}}</td>
        <td style="text-align: center">{{$q->kelas}}</td>
        <td style="text-align: center" colspan="2">{{$q->tanggal_masuk}}</td>
    </tr>
    @endforeach
</tbody>
