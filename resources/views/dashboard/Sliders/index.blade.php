@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 shadow-sm sm:rounded-lg mb-6">
            <a href="{{ route('sliders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                Add New Slider
            </a>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Title</th>
                            <th class="border px-4 py-2">Subtitle</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Video Link</th>
                            <th class="border px-4 py-2">Background Image</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $slider->title }}</td>
                                <td class="border px-4 py-2">{{ $slider->subtitle }}</td>
                                <td class="border px-4 py-2">{{ $slider->description }}</td>
                                <td class="border px-4 py-2">
                                    @if($slider->video_link)
                                        <a href="{{ $slider->video_link }}" target="_blank" class="text-blue-500 underline">View</a>
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    @if($slider->background_image)
                                        <img src="{{ asset('storage/' . $slider->background_image) }}" class="w-24 h-12 object-cover">
                                    @endif
                                </td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <a href="{{ route('sliders.edit', $slider->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border px-4 py-2 text-center text-gray-500">No sliders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
