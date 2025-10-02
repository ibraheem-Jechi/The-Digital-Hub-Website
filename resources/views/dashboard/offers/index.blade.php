@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Offers</h1>
            <a href="{{ route('offers.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                + Add New Offer
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 my-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 shadow-sm sm:rounded-lg overflow-auto">
            <table class="table-auto w-full border border-gray-200">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Subtitle</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Button Text</th>
                        <th class="px-4 py-2">Button Link</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($offers as $offer)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $offer->title }}</td>
                            <td class="px-4 py-2">{{ $offer->subtitle }}</td>
                            <td class="px-4 py-2">{{ $offer->description }}</td>
                            <td class="px-4 py-2">
                                @if($offer->image)
                                    <img src="{{ asset('storage/' . $offer->image) }}" alt="" width="80">
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $offer->button_text }}</td>
                            <td class="px-4 py-2">{{ $offer->button_link }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('offers.edit', $offer) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('offers.destroy', $offer) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center px-4 py-2 text-gray-500">
                                No offers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
