@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-gray-800 mb-4">Add Slider</h2>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle') }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Description</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Video Link</label>
                    <input type="url" name="video_link" value="{{ old('video_link') }}" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Background Image</label>
                    <input type="file" name="background_image" class="w-full border rounded px-3 py-2" accept="image/*">
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Add Slider</button>
            </form>
        </div>
    </div>
</div>
@endsection
