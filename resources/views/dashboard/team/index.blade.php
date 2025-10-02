@extends('layouts.backend')

@section('content')
<div class="flex flex-col">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Team Members</h2>
        <a href="{{ route('team.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Member</a>
    </div>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300 shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm font-semibold">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Photo</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($teamMembers as $index => $member)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border text-center">
                        @if($member->photo)
                            <img src="{{ asset('storage/'.$member->photo) }}" alt="{{ $member->name }}" class="w-16 h-16 object-cover rounded-full mx-auto">
                        @else
                            <img src="https://via.placeholder.com/60x60?text=No+Image" alt="No Image" class="w-16 h-16 object-cover rounded-full mx-auto">
                        @endif
                    </td>
                    <td class="px-4 py-2 border">{{ $member->name }}</td>
                    <td class="px-4 py-2 border">{{ $member->description }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('team.edit', $member->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 mr-2">Edit</a>
                        <form action="{{ route('team.destroy', $member->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
