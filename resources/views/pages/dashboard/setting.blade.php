@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Update Time Settings</h2>
        <form method="POST" action="{{ route('setting') }}">
            @csrf
            <div class="mb-4">
                <label for="start_time_enter" class="block text-gray-700">Start Time Enter:</label>
                <input type="time" class="form-input mt-1 block w-full rounded-md py-2 border border-gray-300 px-4" id="start_time_enter" name="start_time_enter" value="{{ old('start_time_enter', $data->start_time_enter ?? '') }}" required>
                @error('start_time_enter')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="end_time_enter" class="block text-gray-700">End Time Enter:</label>
                <input type="time" class="form-input mt-1 block w-full rounded-md py-2 border border-gray-300 px-4" id="end_time_enter" name="end_time_enter" value="{{ old('end_time_enter', $data->end_time_enter ?? '') }}" required>
                @error('end_time_enter')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="start_time_leave" class="block text-gray-700">Start Time Leave:</label>
                <input type="time" class="form-input mt-1 block w-full rounded-md py-2 border border-gray-300 px-4" id="start_time_leave" name="start_time_leave" value="{{ old('start_time_leave', $data->start_time_leave ?? '') }}" required>
                @error('start_time_leave')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="end_time_leave" class="block text-gray-700">End Time Leave:</label>
                <input type="time" class="form-input mt-1 block w-full rounded-md py-2 border border-gray-300 px-4" id="end_time_leave" name="end_time_leave" value="{{ old('end_time_leave', $data->end_time_leave ?? '') }}" required>
                @error('end_time_leave')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
@endsection
