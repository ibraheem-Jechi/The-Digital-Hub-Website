@extends('layouts.backend')

@section('title', 'Contact Messages')

@section('content')
<div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
    <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
        <div class="px-6 py-2 border-b border-light-grey">
            <div class="font-bold text-xl">Contact Messages</div>
        </div>

        @php($messages = $messages ?? ($contacts ?? collect()))
        @if($messages instanceof \Illuminate\Pagination\LengthAwarePaginator || $messages instanceof \Illuminate\Support\Collection)
            @if($messages->isEmpty())
                <div class="p-6 text-grey-darkest">No messages have been received yet.</div>
            @else
                <div class="table-responsive">
                    <table class="table text-grey-darkest w-full">
                        <thead class="bg-grey-dark text-white text-normal">
                            <tr>
                                <th class="px-3 py-2">#</th>
                                <th class="px-3 py-2">When</th>
                                <th class="px-3 py-2">Name</th>
                                <th class="px-3 py-2">Email</th>
                                <th class="px-3 py-2">Phone</th>
                                <th class="px-3 py-2">Project</th>
                                <th class="px-3 py-2">Subject</th>
                                <th class="px-3 py-2">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $i => $m)
                                <tr class="border-b">
                                    <td class="px-3 py-2">
                                        @if(method_exists($messages, 'firstItem'))
                                            {{ $messages->firstItem() + $i }}
                                        @else
                                            {{ $m->id }}
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">{{ optional($m->created_at)->format('Y-m-d H:i') }}</td>
                                    <td class="px-3 py-2">{{ $m->name }}</td>
                                    <td class="px-3 py-2">
                                        @if(!empty($m->email))
                                            <a class="text-blue-600 hover:underline" href="mailto:{{ $m->email }}">{{ $m->email }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">{{ $m->phone ?? '-' }}</td>
                                    <td class="px-3 py-2">{{ $m->project ?? '-' }}</td>
                                    <td class="px-3 py-2">{{ $m->subject ?? '-' }}</td>
                                    <td class="px-3 py-2">
                                        <div class="truncate max-w-xs" title="{{ $m->message }}">
                                            {{ $m->message }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(method_exists($messages, 'links'))
                    <div class="px-6 py-4">
                        {{ $messages->links() }}
                    </div>
                @endif
            @endif
        @else
            <div class="p-6 text-red-700">Data variable not found. Controller must pass <code>$messages</code>.</div>
        @endif
    </div>
</div>
@endsection
