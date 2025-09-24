<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sponsorships</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <a href="{{ route('sponsorships.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New</a>

                <table class="min-w-full table-auto border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Logo</th>
                            <th class="border px-4 py-2">Website</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sponsorships as $sponsorship)
                        <tr>
                            <td class="border px-4 py-2">{{ $sponsorship->id }}</td>
                            <td class="border px-4 py-2">{{ $sponsorship->description }}</td>
                            <td class="border px-4 py-2">
                                <img src="{{ $sponsorship->logo_url }}" alt="logo" width="50">
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ $sponsorship->website_url }}" target="_blank" class="text-blue-600 underline">{{ $sponsorship->website_url }}</a>
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('sponsorships.edit', $sponsorship->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                
                                <form action="{{ route('sponsorships.destroy', $sponsorship->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded"
                                        onclick="return confirm('Are you sure you want to delete this sponsorship?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($sponsorships->isEmpty())
                        <tr>
                            <td colspan="5" class="border px-4 py-2 text-center text-gray-500">No sponsorships found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
