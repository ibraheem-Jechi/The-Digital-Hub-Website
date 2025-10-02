@extends('layouts.backend')

@section('content')
<div class="flex flex-1 flex-col mx-2">
    <!-- Add Sponsorship Form -->
    <div class="bg-white p-6 shadow-sm sm:rounded-lg mb-6">
        <h2 class="font-semibold text-xl text-gray-800 mb-4">Add Sponsorship</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sponsorships.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Description</label>
                <input type="text" name="description" class="w-full border rounded px-3 py-2" value="{{ old('description') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Upload Logo</label>
                <input type="file" name="logo" class="w-full border rounded px-3 py-2" accept="image/*" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Website URL</label>
                <input type="url" name="website_url" class="w-full border rounded px-3 py-2" value="{{ old('website_url') }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Sponsorship</button>
        </form>
    </div>

    <!-- Sponsorships Table -->
    <div class="bg-white p-6 shadow-sm sm:rounded-lg">
        <h2 class="font-semibold text-xl text-gray-800 mb-4">All Sponsorships</h2>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Logo</th>
                    <th class="border px-4 py-2">Website</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sponsorships as $sponsorship)
                    <tr>
                        <td class="border px-4 py-2">{{ $sponsorship->id }}</td>
                        <td class="border px-4 py-2">{{ $sponsorship->description }}</td>
                        <td class="border px-4 py-2">
                            @if($sponsorship->logo_url)
                                <img src="{{ asset('storage/' . $sponsorship->logo_url) }}" alt="Logo" class="h-10 object-contain">
                            @else
                                <span class="text-gray-500">No Logo</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ $sponsorship->website_url }}" target="_blank" class="text-blue-600 underline">Visit</a>
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex gap-2">
                                <a href="{{ route('sponsorships.edit', $sponsorship->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('sponsorships.destroy', $sponsorship->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center text-gray-500">No sponsorships found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
