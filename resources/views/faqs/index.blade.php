@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Manage FAQs</h1>
            <a href="{{ route('faqs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add FAQ
            </a>
        </div>

        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Question</th>
                        <th class="border px-4 py-2">Answer</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $faq->question }}</td>
                            <td class="border px-4 py-2">{{ Str::limit($faq->answer, 50) }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('faqs.edit', $faq->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($faqs->isEmpty())
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-center text-gray-500">
                                No FAQs found.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
