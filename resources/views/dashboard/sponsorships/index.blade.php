@extends('layouts.backend')

@section('content')
<div class="flex flex-1 flex-col mx-2 py-6">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">Sponsorships</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <a href="{{ route('sponsorships.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New</a>

            <table class="min-w-full table-auto border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Logo</th>
                        <th class="border px-4 py-2">Website</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sponsorships as $sponsorship)
                        <tr>
                            <td class="border px-4 py-2">{{ $sponsorship->id }}</td>
                            <td class="border px-4 py-2">{{ $sponsorship->description }}</td>
                            <td class="border px-4 py-2">
                                @if($sponsorship->logo_url)
                                    <img src="{{ asset('storage/' . $sponsorship->logo_url) }}" alt="logo" class="h-10 object-contain">
                                @else
                                    <span class="text-gray-500">No Logo</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ $sponsorship->website_url }}" target="_blank" class="text-blue-600 underline">Visit</a>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex gap-2">
                                    <a href="{{ route('sponsorships.edit', $sponsorship->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                    
                                    <form action="{{ route('sponsorships.destroy', $sponsorship->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded"
                                            onclick="return confirm('Are you sure you want to delete this sponsorship?');">
                                            Delete
                                        </button>
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
</div>
@endsection
