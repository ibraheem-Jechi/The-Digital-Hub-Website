@extends('layouts.backend')

@section('content')
<div class="flex flex-1 flex-col mx-2">
    <!-- Workshops Table -->
    <div class="mb-2 border rounded shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-b flex justify-between items-center">
            <span class="font-bold">Workshops Table</span>
            <button onclick="openModal('addWorkshopModal')" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                + Add Workshop
            </button>
        </div>
        <div class="p-3 overflow-x-auto">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Image</th>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Description</th>
                        <th class="border px-4 py-2">Event Date</th>
                        <th class="border px-4 py-2">Program ID</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workshops as $workshop)
                        <tr>
                            <td class="border px-4 py-2">
                                @if($workshop->image)
                                    <img src="{{ asset('storage/' . $workshop->image) }}" class="h-12 w-12 object-cover rounded">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">{{ $workshop->title }}</td>
                            <td class="border px-4 py-2">{{ Str::limit($workshop->description, 50) }}</td>
                            <td class="border px-4 py-2">{{ $workshop->event_date->format('Y-m-d') }}</td>
                            <td class="border px-4 py-2">{{ $workshop->program_id ?? '-' }}</td>
                            <td class="border px-4 py-2">
                                <button onclick="openModal('viewWorkshopModal-{{ $workshop->workshop_id }}')" class="bg-green-500 rounded p-1 mx-1 text-white"><i class="fas fa-eye"></i></button>
                                <button onclick="openModal('editWorkshopModal-{{ $workshop->workshop_id }}')" class="bg-yellow-500 rounded p-1 mx-1 text-white"><i class="fas fa-edit"></i></button>
                                <form action="{{ route('workshops.destroy', $workshop->workshop_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 rounded p-1 mx-1 text-white"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Workshop Modal -->
    <div id="addWorkshopModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-5 w-1/2">
            <h2 class="text-xl font-bold mb-4">Add Workshop</h2>
            <form action="{{ route('workshops.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Title" class="w-full border p-2 mb-2">
                <textarea name="description" placeholder="Description" class="w-full border p-2 mb-2"></textarea>
                <input type="date" name="event_date" class="w-full border p-2 mb-2">
                <input type="number" name="program_id" placeholder="Program ID" class="w-full border p-2 mb-2">
                <input type="file" name="image" class="w-full border p-2 mb-2">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
                <button type="button" onclick="closeModal('addWorkshopModal')" class="bg-gray-500 text-white px-3 py-1 rounded">Cancel</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function sidebarToggle() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) sidebar.classList.toggle('hidden');
    }

    function profileToggle() {
        const profile = document.getElementById('ProfileDropDown');
        if (profile) profile.classList.toggle('hidden');
    }
</script>
@endsection
