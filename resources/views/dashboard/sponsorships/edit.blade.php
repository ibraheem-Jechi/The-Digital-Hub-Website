<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Sponsorship</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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
                <form action="{{ route('sponsorships.update', $sponsorship->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <input type="text" name="description" value="{{ old('description', $sponsorship->description) }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Logo URL</label>
                        <input type="url" name="logo_url" value="{{ old('logo_url', $sponsorship->logo_url) }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Website URL</label>
                        <input type="url" name="website_url" value="{{ old('website_url', $sponsorship->website_url) }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Sponsorship</button>
                    <a href="{{ url('/dashboard/ui') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
php 