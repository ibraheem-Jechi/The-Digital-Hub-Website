@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 mb-4">Edit Slider</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $slider->title) }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Description</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description', $slider->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Video Link</label>
                    <input type="url" name="video_link" value="{{ old('video_link', $slider->video_link) }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Background Image</label>
                    @if($slider->background_image)
                        <img src="{{ asset('storage/' . $slider->background_image) }}" alt="BG Image" class="h-24 mb-2 object-cover">
                    @endif
                    <input type="file" name="background_image" class="w-full border rounded px-3 py-2" accept="image/*">
                </div>

                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Update Slider</button>
                <a href="{{ route('sliders.index') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
