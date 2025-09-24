<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sponsorship Details</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <p><strong>ID:</strong> {{ $sponsorship->id }}</p>
                <p><strong>Description:</strong> {{ $sponsorship->description }}</p>
                <p><strong>Logo:</strong> <img src="{{ $sponsorship->logo_url }}" alt="Logo" width="100"></p>
                <p><strong>Website:</strong> <a href="{{ $sponsorship->website_url }}" target="_blank">{{ $sponsorship->website_url }}</a></p>
                <p><strong>Created At:</strong> {{ $sponsorship->created_at }}</p>
                <p><strong>Updated At:</strong> {{ $sponsorship->updated_at }}</p>

                <a href="{{ route('sponsorships.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
