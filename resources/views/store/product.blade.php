@extends('layouts.app')

@section('content')

<h1 class="text-[1.3em] font-[600] text-gray-700">Products</h1>

<h3 class="mt-[30px] font-[600] mb-[10px]">Product categories</h3>
<table class="bg-[white] border border-gray-300 w-full rounded-lg">
    <thead>
        <th>
            <tr class="font-[600] bg-blue-500 text-[white]">
                <td class="border-r border-gray-300 p-[7px_10px]">Items</td>
                <td class="border-r border-gray-300 p-[7px_10px]">Category</td>
                <td class="p-[7px_10px]">Action</td>
            </tr>
        </th>
    </thead>

    <tbody>
        <tr class="border-t border-gray-300">
            <td class="border-r border-gray-300 p-[7px_10px]">4566</td>
            <td class="border-r border-gray-300 p-[7px_10px]">beverages</td>
            <td class="p-[7px_10px]"><button class="hover:bg-blue-400 bg-blue-500 text-[white] p-[5px_10px] rounded-lg cursor-pointer">View</button></td>
        </tr>

        <tr class="border-t border-gray-300">
            <td class="border-r border-gray-300 p-[7px_10px]">4566</td>
            <td class="border-r border-gray-300 p-[7px_10px]">beverages</td>
            <td class="p-[7px_10px]"><button class="hover:bg-blue-400 bg-blue-500 text-[white] p-[5px_10px] rounded-lg cursor-pointer">View</button></td>
        </tr>
    </tbody>
</table>

@endsection