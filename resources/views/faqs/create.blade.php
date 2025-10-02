@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Add FAQ</h1>

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
            <form action="{{ route('faqs.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-semibold">Question</label>
                    <input type="text" name="question" class="w-full border rounded px-3 py-2" value="{{ old('question') }}" required>
                </div>
                <div>
                    <label class="block font-semibold">Answer</label>
                    <textarea name="answer" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('answer') }}</textarea>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Save
                    </button>
                    <a href="{{ route('faqs.index') }}" class="text-gray-600 hover:underline px-4 py-2 rounded border">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
