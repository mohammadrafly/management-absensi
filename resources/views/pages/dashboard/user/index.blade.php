@extends('layouts.app')

@section('content')
    
<a href="{{ route('user.create')}}" class="py-2 px-5 bg-[#5AB2FF] rounded text-white">Tambah Pengguna</a>

<table id="id" class="display" style="width:100%">
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 20%">Nama</th>
            <th style="width: 35%">Email</th>
            <th style="width: 20%">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <a href="{{ route('user.update', $item->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                <a href="#" 
                   class="text-red-500 hover:text-red-700 mr-2" 
                   x-data 
                   @click.prevent="if(confirm('Are you sure you want to delete this user?')) window.location.href='{{ route('user.delete', $item->id) }}'">
                   Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
