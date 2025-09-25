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
                <form action="{{ route('sponsorships.update', $sponsorship->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <input type="text" name="description"
                               value="{{ old('description', $sponsorship->description) }}"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <!-- Current Logo -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Current Logo</label>
                        @if($sponsorship->logo_url)
                            <img src="{{ asset('storage/' . $sponsorship->logo_url) }}" 
                                 alt="Sponsor Logo"
                                 class="mb-2 h-20">
                        @else
                            <p class="text-gray-500">No logo uploaded</p>
                        @endif
                        <input type="file" name="logo" class="w-full border rounded px-3 py-2">
                        <p class="text-sm text-gray-500">Leave empty if you don’t want to change the logo.</p>
                    </div>

                    <!-- Website URL -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Website URL</label>
                        <input type="url" name="website_url"
                               value="{{ old('website_url', $sponsorship->website_url) }}"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <!-- Buttons -->
                    <div class="flex space-x-2">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Update Sponsorship
                        </button>
                        <a href="{{ route('dashboard.ui') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>