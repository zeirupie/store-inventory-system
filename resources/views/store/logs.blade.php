@extends('layouts.app')

@section('content')
    <h1 class="text-[1.3em] font-[600] text-gray-700">Logs</h1>

    <div class="pt-[30px] pb-[100px]">
        <table class="bg-[white] border border-gray-300 w-full rounded-lg min-w-[600px]">
            <thead>
                <tr class="font-[600] bg-blue-500 text-[white]">
                    <td class="border-r border-gray-300 p-[7px_10px]">ID</td>
                    <td class="border-r border-gray-300 p-[7px_10px]">Message</td>
                    <td class="border-r border-gray-300 p-[7px_10px]">Date</td>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                    <tr class="border-t border-gray-300">
                        <td class="border-r border-gray-300 p-[7px_10px]">
                            {{ $log->id}}
                        </td>
                        <td class="border-r border-gray-300 p-[7px_10px]">
                            {{ $log->message}}
                        </td>
                        <td class="border-r border-gray-300 p-[7px_10px]">
                            {{ $log->created_at }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4 text-gray-500">No log found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection