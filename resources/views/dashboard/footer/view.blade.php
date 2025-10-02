@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold mb-4">View Footer</h1>

        <div class="flex flex-wrap gap-4 mt-4 mb-6">
            <a href="{{ route('dashboard.footer.action') }}"
               class="px-6 py-3 bg-gray-600 text-white rounded mr-4 hover:bg-gray-700 transition">
                Back to Actions
            </a>
            <a href="{{ route('dashboard.footer.edit') }}"
               class="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 transition">
                Edit Footer
            </a>
        </div>

        <table class="min-w-full bg-white rounded shadow-md">
            <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 text-left">Field</th>
                <th class="py-2 px-4 text-left">Value</th>
            </tr>
            </thead>
            <tbody>
            <tr><td class="py-2 px-4 font-semibold">Title</td><td class="py-2 px-4">{{ $footer->title ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">Description</td><td class="py-2 px-4">{{ $footer->description ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">Address</td><td class="py-2 px-4">{{ $footer->address ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">Email</td><td class="py-2 px-4">{{ $footer->email ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">Phone</td><td class="py-2 px-4">{{ $footer->phone ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">Website</td><td class="py-2 px-4">{{ $footer->website ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">Facebook</td><td class="py-2 px-4">{{ $footer->facebook ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">Twitter</td><td class="py-2 px-4">{{ $footer->twitter ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">Instagram</td><td class="py-2 px-4">{{ $footer->instagram ?? 'N/A' }}</td></tr>
            <tr><td class="py-2 px-4 font-semibold">LinkedIn</td><td class="py-2 px-4">{{ $footer->linkedin ?? 'N/A' }}</td></tr>
            </tbody>
        </table>

    </div>
</div>
@endsection
