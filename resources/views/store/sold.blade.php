@extends('layouts.app')

@section('content')

<h1 class="text-[1.3em] font-[600] text-gray-700 mb-6">Sold Products</h1>

<div class="bg-white rounded-lg shadow-md p-6 mb-8 max-w-2xl mx-auto">
    <h2 class="text-lg font-semibold text-blue-600 mb-4">Add Sold Products</h2>
    @if (session('success'))
        <div class="mb-4">
            <div class="bg-green-100 z-10 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div id="error-toast" class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-50 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg transition-opacity duration-300 opacity-100">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('error-toast');
                if (toast) {
                    toast.style.opacity = '0';
                    setTimeout(() => {
                        toast.style.display = 'none';
                    }, 300); 
                }
            }, 900); 
        </script>
    @endif
    <form method="POST" action="{{ route('add.sold') }}">
        @csrf
        <div id="sold-products-list">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 sold-product-row relative">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Product ID</label>
                    <input name="item_id" type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" placeholder="e.g. 101">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Quantity Sold</label>
                    <input name="sold_quantity" type="number" min="1" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" placeholder="e.g. 10" >
                </div>
               
            </div>
        </div>
        <div class="flex items-center justify-center gap-4 mt-[40px]">
            <button type="button" id="add-row-btn" class="cursor-pointer bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded transition">Add Another Product</button>
            <button type="submit" class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded transition">Add to Sold List</button>
        </div>
    </form>
</div>

<!-- Sold Products Table -->
<section class="max-container pb-20 py-[50px]">
    <div class="bg-white rounded-lg shadow-md overflow-x-auto">
        <table class="bg-[white] border border-gray-300 w-full rounded-lg min-w-[600px]">
            <thead>
                <tr class="font-[600] bg-blue-500 text-[white]">
                    <td class="border-r border-gray-300 p-[7px_10px]">Product Name</td>
                    <td class="border-r border-gray-300 p-[7px_10px]">Category</td>
                    <td class="border-r border-gray-300 p-[7px_10px]">Quantity Sold</td>
                    <td class="border-r border-gray-300 p-[7px_10px]">Total Sales</td>
                    <td class="border-r border-gray-300 p-[7px_10px]">Profit</td>
                    <td class="p-[7px_10px]">Date Sold</td>
                </tr>
            </thead>
            <tbody>
                @forelse($sold_products as $sold)
                    <tr class="border-t border-gray-300">
                        <td class="border-r border-gray-300 p-[7px_10px]">
                            {{ $sold->product_name ?? $sold->item_name ?? 'N/A' }}
                        </td>
                        <td class="border-r border-gray-300 p-[7px_10px]">
                            {{ $sold->category ?? 'N/A' }}
                        </td>
                        <td class="border-r border-gray-300 p-[7px_10px]">
                            {{ $sold->quantity }}
                        </td>
                        <td class="border-r border-gray-300 p-[7px_10px]">
                            ₱{{ number_format($sold->sales, 2) }}
                        </td>
                        <td class="border-r border-gray-300 p-[7px_10px]">
                            ₱{{ number_format($sold->profit, 2) }}
                        </td>
                        <td class="p-[7px_10px]">
                            {{ $sold->created_at ? $sold->created_at->format('Y-m-d') : 'N/A' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-4 text-gray-500">No sold products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

<script>
    let productIndex = 1;
    document.getElementById('add-row-btn').addEventListener('click', function(e) {
        e.preventDefault();
        const container = document.getElementById('sold-products-list');
        const row = document.createElement('div');
        row.className = "grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 sold-product-row relative";
        row.innerHTML = `
            <div>
                <label class="block mb-1 font-medium text-gray-700">Product ID</label>
                <input name="products[${productIndex}][product_id]" type="text" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" placeholder="e.g. 101" required>
            </div>
            <div>
                <label class="block mb-1 font-medium text-gray-700">Quantity Sold</label>
                <input name="products[${productIndex}][quantity]" type="number" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" placeholder="e.g. 10" required>
            </div>
            <button type="button" class="remove-row-btn absolute top-0 right-0 mt-[-10px] mr-[-10px] bg-red-500 hover:bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center" title="Remove">
                &times;
            </button>
        `;
        productIndex++;
        container.appendChild(row);
    });

    // Remove product row functionality (cannot remove the first row)
    document.getElementById('sold-products-list').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row-btn')) {
            const row = e.target.closest('.sold-product-row');
            if (document.querySelectorAll('.sold-product-row').length > 1 && row !== this.firstElementChild) {
                row.remove();
            }
        }
    });
</script>


@endsection
