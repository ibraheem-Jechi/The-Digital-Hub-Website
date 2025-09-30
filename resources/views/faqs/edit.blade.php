<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit FAQ</title>
    <link rel="stylesheet" href="/admin/dist/styles.css">
    <link rel="stylesheet" href="/admin/dist/all.css">
</head>
<body>
<div class="mx-auto bg-grey-400">
    <div class="min-h-screen flex flex-col">
        <!-- HEADER -->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Digital Hub</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-4 py-2 bg-white text-gray-800 hover:bg-gray-100 rounded">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- SIDEBAR -->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <ul class="list-reset flex flex-col">
                    <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="{{ url('/dashboard') }}" class="text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="{{ route('faqs.index') }}" class="text-sm text-nav-item no-underline font-bold">
                            <i class="fas fa-question-circle float-left mx-2"></i> FAQs
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- MAIN -->
            <main class="bg-white-300 flex-1 p-6 overflow-auto">
                <h1 class="text-2xl font-bold mb-4">Edit FAQ</h1>
                <form action="{{ route('faqs.update', $faq->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block font-semibold">Question</label>
                        <input type="text" name="question" value="{{ $faq->question }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-semibold">Answer</label>
                        <textarea name="answer" rows="5" class="w-full border rounded px-3 py-2" required>{{ $faq->answer }}</textarea>
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
                    <a href="{{ route('faqs.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
                </form>
            </main>
        </div>

        <!-- FOOTER -->
        <footer class="bg-gray-900 text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; DIGITAL HUB</div>
        </footer>
    </div>
</div>
<script src="/main.js"></script>
</body>
</html>
