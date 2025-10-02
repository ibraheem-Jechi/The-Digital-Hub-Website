@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 shadow-sm sm:rounded-lg mb-6 overflow-x-auto">
            <a href="{{ route('about.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                Add New About
            </a>

            <!-- Top Table: Basic Info -->
            <div class="mb-6">
                <h3 class="font-semibold mb-2">Basic Info</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border px-3 py-2">ID</th>
                                <th class="border px-3 py-2">Title</th>
                                <th class="border px-3 py-2">Subtitle</th>
                                <th class="border px-3 py-2">Description</th>
                                <th class="border px-3 py-2">Phone</th>
                                <th class="border px-3 py-2">Image</th>
                                <th class="border px-3 py-2">Created At</th>
                                <th class="border px-3 py-2">Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($abouts as $about)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-3 py-2">{{ $about->id }}</td>
                                    <td class="border px-3 py-2">{{ $about->title }}</td>
                                    <td class="border px-3 py-2">{{ $about->subtitle }}</td>
                                    <td class="border px-3 py-2 max-w-xs truncate" title="{{ $about->description }}">
                                        {{ Str::limit($about->description, 50) }}
                                    </td>
                                    <td class="border px-3 py-2">{{ $about->phone }}</td>
                                    <td class="border px-3 py-2 text-center">
                                        @if($about->image)
                                            <img src="{{ asset('storage/' . $about->image) }}" class="w-20 h-12 object-cover rounded border mx-auto">
                                        @else
                                            <span class="text-gray-400 text-xs">No Image</span>
                                        @endif
                                    </td>
                                    <td class="border px-3 py-2">{{ $about->created_at }}</td>
                                    <td class="border px-3 py-2">{{ $about->updated_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="border px-3 py-2 text-center text-gray-500">
                                        No About sections found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bottom Table: Features + Actions -->
            <div>
                <h3 class="font-semibold mb-2">Features & Actions</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border px-3 py-2 text-center">F1 Icon</th>
                                <th class="border px-3 py-2">F1 Title</th>
                                <th class="border px-3 py-2">F1 Desc</th>
                                <th class="border px-3 py-2 text-center">F2 Icon</th>
                                <th class="border px-3 py-2">F2 Title</th>
                                <th class="border px-3 py-2">F2 Desc</th>
                                <th class="border px-3 py-2 text-center">F3 Icon</th>
                                <th class="border px-3 py-2">F3 Title</th>
                                <th class="border px-3 py-2">F3 Desc</th>
                                <th class="border px-3 py-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($abouts as $about)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-3 py-2 text-center"><i class="{{ $about->feature_1_icon }}"></i></td>
                                    <td class="border px-3 py-2">{{ $about->feature_1_title }}</td>
                                    <td class="border px-3 py-2">{{ $about->feature_1_description }}</td>
                                    <td class="border px-3 py-2 text-center"><i class="{{ $about->feature_2_icon }}"></i></td>
                                    <td class="border px-3 py-2">{{ $about->feature_2_title }}</td>
                                    <td class="border px-3 py-2">{{ $about->feature_2_description }}</td>
                                    <td class="border px-3 py-2 text-center"><i class="{{ $about->feature_3_icon }}"></i></td>
                                    <td class="border px-3 py-2">{{ $about->feature_3_title }}</td>
                                    <td class="border px-3 py-2">{{ $about->feature_3_description }}</td>
                                    <td class="border px-3 py-2 flex justify-center space-x-2">
                                        <a href="{{ route('about.edit', $about->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded min-w-[60px] text-center">Edit</a>
                                        <form action="{{ route('about.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded min-w-[70px] text-center">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="border px-3 py-2 text-center text-gray-500">
                                        No About sections found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
