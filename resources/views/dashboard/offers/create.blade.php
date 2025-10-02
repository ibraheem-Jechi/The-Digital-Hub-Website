@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Add New Offer</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold">Title</label>
                <input type="text" name="title" class="w-full border px-3 py-2 rounded" value="{{ old('title') }}">
            </div>

            <div>
                <label class="block font-semibold">Subtitle</label>
                <input type="text" name="subtitle" class="w-full border px-3 py-2 rounded" value="{{ old('subtitle') }}">
            </div>

            <div>
                <label class="block font-semibold">Description</label>
                <textarea name="description" rows="5" class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Image</label>
                <input type="file" name="image" class="w-full">
            </div>

            <div>
                <label class="block font-semibold">Button Text</label>
                <input type="text" name="button_text" class="w-full border px-3 py-2 rounded" value="{{ old('button_text') }}">
            </div>

            <div>
                <label class="block font-semibold">Button Link</label>
                <input type="text" name="button_link" class="w-full border px-3 py-2 rounded" value="{{ old('button_link') }}">
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                    Save Offer
                </button>
                <a href="{{ route('offers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
