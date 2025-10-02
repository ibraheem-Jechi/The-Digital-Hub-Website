@extends('layouts.backend')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New User</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('forms.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Full Name</label>
            <input type="text" name="name" required class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1">Email</label>
            <input type="email" name="email" required class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1">Password</label>
            <input type="password" name="password" required class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" required class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1">Phone Number</label>
            <input type="text" name="phone" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block mb-1">Role</label>
            <select name="role" required class="w-full p-2 border rounded">
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
            </select>
        </div>

        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Add User
        </button>
    </form>
@endsection
