@extends('layouts.backend')

@section('content')
<div class="flex-1 p-6">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
        <h2 class="text-2xl font-bold mb-6">Edit Team Member</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ old('name', $teamMember->name) }}" placeholder="Name"
                   class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>

            <textarea name="description" rows="4" placeholder="Description"
                      class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $teamMember->description) }}</textarea>

            @if($teamMember->photo)
                <img src="{{ asset('storage/'.$teamMember->photo) }}" alt="{{ $teamMember->name }}" class="w-24 h-24 object-cover rounded mb-2">
            @endif

            <input type="file" name="photo" accept="image/*"
                   class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            <small class="text-gray-500 block">Upload a new photo to replace the old one.</small>

            <div class="flex space-x-3 mt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update Member
                </button>
                <a href="{{ route('team.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
