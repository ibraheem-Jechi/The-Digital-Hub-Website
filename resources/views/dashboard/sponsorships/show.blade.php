@extends('layouts.backend')

@section('content')
<div class="flex flex-1 flex-col mx-2 py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Sponsorship Details</h2>

        <div class="bg-white p-6 shadow-sm sm:rounded-lg space-y-2">
            <p><strong>ID:</strong> {{ $sponsorship->id }}</p>
            <p><strong>Description:</strong> {{ $sponsorship->description }}</p>
            <p><strong>Logo:</strong>
                @if($sponsorship->logo_url)
                    <img src="{{ asset('storage/' . $sponsorship->logo_url) }}" alt="Logo" class="h-20 object-contain">
                @else
                    <span class="text-gray-500">No Logo</span>
                @endif
            </p>
            <p><strong>Website:</strong>
                <a href="{{ $sponsorship->website_url }}" target="_blank" class="text-blue-600 underline">
                    {{ $sponsorship->website_url }}
                </a>
            </p>
            <p><strong>Created At:</strong> {{ $sponsorship->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $sponsorship->updated_at }}</p>

            <a href="{{ route('sponsorships.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">
                Back
            </a>
        </div>
    </div>
</div>
@endsection
