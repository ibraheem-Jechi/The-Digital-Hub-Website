@extends('layouts.backend')

@section('content')
<div class="flex flex-1 flex-col mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-b flex justify-between">
            <span>Programs Table</span>
            <button onclick="openModal('addModal')"
                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                + Add Program
            </button>
        </div>
        <div class="p-3 overflow-x-auto">
            <table class="table-auto w-full rounded">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Image</th>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Duration</th>
                        <th class="border px-4 py-2">Start</th>
                        <th class="border px-4 py-2">End</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $program)
                        <tr>
                            <td class="border px-4 py-2">
                                @if($program->image)
                                    <img src="{{ asset('storage/' . $program->image) }}"
                                         class="h-12 w-12 object-cover rounded">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">{{ $program->title }}</td>
                            <td class="border px-4 py-2">{{ $program->category }}</td>
                            <td class="border px-4 py-2">{{ $program->duration }}</td>
                            <td class="border px-4 py-2">{{ $program->start_date }}</td>
                            <td class="border px-4 py-2">{{ $program->end_date }}</td>
                            <td class="border px-4 py-2">
                                <button onclick="openModal('viewModal-{{ $program->program_id }}')"
                                        class="bg-green-500 rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="openModal('editModal-{{ $program->program_id }}')"
                                        class="bg-yellow-500 rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('programs.destroy', $program->program_id) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 rounded p-1 mx-1 text-white">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- View Modal -->
                        <div id="viewModal-{{ $program->program_id }}"
                             class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <div class="bg-white rounded-lg p-5 w-1/2">
                                <h2 class="text-xl font-bold mb-4">View Program</h2>
                                @if($program->image)
                                    <img src="{{ asset('storage/' . $program->image) }}"
                                         class="mb-3 w-32 h-32 object-cover rounded">
                                @endif
                                <p><b>Title:</b> {{ $program->title }}</p>
                                <p><b>Description:</b> {{ $program->description }}</p>
                                <p><b>Category:</b> {{ $program->category }}</p>
                                <p><b>Duration:</b> {{ $program->duration }}</p>
                                <p><b>Start Date:</b> {{ $program->start_date }}</p>
                                <p><b>End Date:</b> {{ $program->end_date }}</p>
                                <button onclick="closeModal('viewModal-{{ $program->program_id }}')"
                                        class="bg-gray-500 text-white px-3 py-1 rounded mt-3">Close</button>
                            </div>
                        </div>

                        <!-- Edit Modal -->
                        <div id="editModal-{{ $program->program_id }}"
                             class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <div class="bg-white rounded-lg p-5 w-1/2">
                                <h2 class="text-xl font-bold mb-4">Edit Program</h2>
                                <form action="{{ route('programs.update', $program->program_id) }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="title" value="{{ $program->title }}"
                                           placeholder="Title" class="w-full border p-2 mb-2">
                                    <textarea name="description" placeholder="Description"
                                              class="w-full border p-2 mb-2">{{ $program->description }}</textarea>
                                    <input type="text" name="category" value="{{ $program->category }}"
                                           placeholder="Category" class="w-full border p-2 mb-2">
                                    <input type="text" name="duration" value="{{ $program->duration }}"
                                           placeholder="Duration" class="w-full border p-2 mb-2">
                                    <input type="date" name="start_date" value="{{ $program->start_date }}"
                                           class="w-full border p-2 mb-2">
                                    <input type="date" name="end_date" value="{{ $program->end_date }}"
                                           class="w-full border p-2 mb-2">
                                    <input type="file" name="image" class="w-full border p-2 mb-2">
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
                                    <button type="button" onclick="closeModal('editModal-{{ $program->program_id }}')"
                                            class="bg-gray-500 text-white px-3 py-1 rounded">Cancel</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Program Modal -->
    <div id="addModal"
         class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-5 w-1/2">
            <h2 class="text-xl font-bold mb-4">Add Program</h2>
            <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Title" class="w-full border p-2 mb-2">
                <textarea name="description" placeholder="Description" class="w-full border p-2 mb-2"></textarea>
                <input type="text" name="category" placeholder="Category" class="w-full border p-2 mb-2">
                <input type="text" name="duration" placeholder="Duration" class="w-full border p-2 mb-2">
                <input type="date" name="start_date" class="w-full border p-2 mb-2">
                <input type="date" name="end_date" class="w-full border p-2 mb-2">
                <input type="file" name="image" class="w-full border p-2 mb-2">
                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Save</button>
                <button type="button" onclick="closeModal('addModal')"
                        class="bg-gray-500 text-white px-3 py-1 rounded">Cancel</button>
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
</script>
@endsection
