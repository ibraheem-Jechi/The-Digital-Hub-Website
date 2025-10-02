@extends('layouts.backend')

@section('content')
<div class="flex flex-1 flex-col mx-2 py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Add Sponsorship</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <form action="{{ route('sponsorships.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Description</label>
                    <input type="text" name="description" class="w-full border rounded px-3 py-2" value="{{ old('description') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Logo URL</label>
                    <input type="url" name="logo_url" class="w-full border rounded px-3 py-2" value="{{ old('logo_url') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Website URL</label>
                    <input type="url" name="website_url" class="w-full border rounded px-3 py-2" value="{{ old('website_url') }}" required>
                </div>

                <div class="flex space-x-2">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Sponsorship</button>
                    <a href="{{ route('sponsorships.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
