@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold mb-4">Edit Footer</h1>

        <div class="flex flex-wrap gap-4 mt-4 mb-6">
            <a href="{{ route('dashboard.footer.action') }}"
               class="px-6 py-3 bg-gray-600 text-white rounded mr-4 hover:bg-gray-700 transition">
                Back to Actions
            </a>
            <a href="{{ route('dashboard.footer.view') }}"
               class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                View Footer
            </a>
        </div>

        <form action="{{ route('dashboard.footer.update') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
            @csrf
            <div>
                <label class="block font-semibold mb-1">Title</label>
                <input type="text" name="title" value="{{ $footer->title ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ $footer->description ?? '' }}</textarea>
            </div>

            <div>
                <label class="block font-semibold mb-1">Address</label>
                <input type="text" name="address" value="{{ $footer->address ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ $footer->email ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Phone</label>
                <input type="text" name="phone" value="{{ $footer->phone ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Website</label>
                <input type="text" name="website" value="{{ $footer->website ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Facebook</label>
                <input type="text" name="facebook" value="{{ $footer->facebook ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Twitter</label>
                <input type="text" name="twitter" value="{{ $footer->twitter ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Instagram</label>
                <input type="text" name="instagram" value="{{ $footer->instagram ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">LinkedIn</label>
                <input type="text" name="linkedin" value="{{ $footer->linkedin ?? '' }}" class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 transition">
                Save Footer
            </button>
        </form>

    </div>
</div>
@endsection
