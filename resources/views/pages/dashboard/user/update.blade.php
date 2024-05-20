@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Update User</h2>
        <form method="POST" action="{{ route('user.update', $data->id) }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" class="form-input mt-1 block w-full rounded-md py-2 border border-gray-300 px-4" id="name" name="name" value="{{ old('name', $data->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" class="form-input mt-1 block w-full rounded-md py-2 border border-gray-300 px-4" id="email" name="email" value="{{ old('email', $data->email) }}" required>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
@endsection
