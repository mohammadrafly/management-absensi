@extends('layouts.app')

@section('content')
    
<table id="id" class="display" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 10%">UID</th>
            <th style="width: 25%">Nama</th>
            <th style="width: 20%">Status Pesan WA</th>
            <th style="width: 20%">Tipe Absen</th>
            <th style="width: 20%">Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->uid }}</td>
            <td>{{ $item->murid->name }}</td>
            <td>
                {{ $item->status == 1 ? 'Sent' : 'Not Sent' }}
            </td>
            <td>
                {{ $item->checkType == 'I' ? 'Absen Masuk' : 'Absen Pulang' }}
            </td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
