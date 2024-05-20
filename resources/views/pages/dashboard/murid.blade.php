@extends('layouts.app')

@section('content')
    
<table id="id" class="display" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 20%">UID</th>
            <th style="width: 35%">Nama</th>
            <th style="width: 40%">Nomor HP</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->uid }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->ophone }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
