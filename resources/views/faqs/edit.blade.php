@extends('layouts.backend')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Edit FAQ</h1>

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
            <form action="{{ route('faqs.update', $faq->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-semibold">Question</label>
                    <input type="text" name="question" value="{{ old('question', $faq->question) }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-semibold">Answer</label>
                    <textarea name="answer" rows="5" class="w-full border rounded px-3 py-2" required>{{ old('answer', $faq->answer) }}</textarea>
                </div>

                <div class="flex space-x-2">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                        Update
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
