@extends('layouts.app')

@section('content')

<h1 class="text-[1.3em] font-[600] text-gray-700">Products</h1>
{{--Category section--}}
<div>
    <div class="flex justify-between items-center mt-[30px]">
        <h3 class="font-[600] mb-[10px]">Categories</h3>

        <div class="flex items-center gap-[10px] mr-[15px] hover:text-green-500 cursor-pointer" id="add_category_open0">
            <h3>Add Category</h3>
            <i class="fas fa-plus-square text-green-500 text-[2em]"></i>
        </div>
    </div>

    <ul class="flex flex-wrap gap-[20px] mt-[10px]">
        @foreach ($db_categories as $category)
            <li class="bg-blue-100 p-[10px_15px] rounded-lg hover:bg-blue-200 relative">
                <form action="{{route('delete.category')}}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                    <button class="absolute right-[-7px] top-[-3px] bg-gray-50 h-[20px] w-[20px] rounded-[50%] cursor-pointer flex items-center justify-center pb-[3px]">&times</button>
                    {{$category->category_name}}</li>
                </form>
        @endforeach
    </ul>
</div>

{{--Add category modal, hidden by default--}}
<div class="fixed top-0 bottom-0 left-0 right-0 bg-[rgba(0,0,0,0.5)] z-15 flex justify-center items-center hidden"  id="add_category_modal">

    <div class="bg-[white] w-[500px] rounded-lg relative mx-auto p-[20px]">
        <span class="text-[1.5em] absolute top-0 right-[15px] cursor-pointer hover:text-gray-800" id="add_category_close">&times</span>
        <h3 class="text-center font-[600]">New Category</h3>
        <form action="{{route('add.category')}}" method="POST"">
            @csrf
            <div>
                <label for="category_name" class="block text-gray-700 mb-[5px]">Category Name</label>
                <input type="text" id="category_name" name="category_name" class="w-full p-[10px] border border-gray-300 rounded mb-[15px]" required>
            </div>

            
            <button type="submit" class="w-full bg-blue-500 text-[white] p-[10px] rounded-lg hover:bg-blue-600 cursor-pointer">Add Category</button>
           
        </form>

    </div>
</div>

{{--Add item modal, hidden by default--}}
<div class="fixed top-0 bottom-0 left-0 right-0 bg-[rgba(0,0,0,0.5)] z-10 flex items-center justify-center hidden" id="add_item_modal">
    <div class="bg-[white] relative rounded-lg p-[10px]">
        <span class="text-[1.5em] absolute right-[15px] cursor-pointer hover:text-gray-800" id="add_item_close">&times</span>

        <form action="{{route('add.item')}}" method="POST" class="p-[20px] flex flex-col">
            @csrf
            <h1 class="text-center font-[600]">Add Item</h1>

                <div class="flex gap-[10px] mt-[20px]">
                    <div>
                        <label for="item_name" class="block text-gray-700 mb-[5px]">Item Name</label>
                        <input type="text" id="item_name" name="item_name" class="w-[255px] p-[10px] border border-gray-300 rounded mb-[15px]" required>
                    </div>

                    <div>
                        <label for="category" class="block text-gray-700 mb-[5px]">Category</label>
                        <select id="category" name="category" class="w-[255px] p-[10px] border border-gray-300 rounded-lg" required>
                            <option value="">Select Category</option>
                            @foreach ($db_categories as $category)
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>

                        <p class="text-[0.8em] p-[5px] mb-[10px] word-break">Add new Category? <span id="add_category_open" class="underline decoration-blue-500 text-blue-500 cursor-pointer">New category</span></p>
                    </div>
                </div>



                <div class="flex gap-[10px]">

                    <div>
                        <label for="price" class="block text-gray-700 mb-[5px]" min="0">Price</label>
                        <input type="number" id="price" name="price" class="w-[255px] p-[10px] border border-gray-300 rounded mb-[15px]" required>
                    </div>

                    <div>
                        <label for="original_price" class="block text-gray-700 mb-[5px]" min="0">Original Price</label>
                        <input type="number" id="original_price" name="original_price" class="w-[255px] p-[10px] border border-gray-300 rounded mb-[15px]" required>
                    </div>

                </div>
                
                <div>
                    <label for="quantity" class="block text-gray-700 mb-[5px]" min="0">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="w-[255px] p-[10px] border border-gray-300 rounded mb-[15px]" required>
                </div>

            
            <button type="submit" class="w-full bg-blue-500 text-[white] p-[10px] rounded-lg hover:bg-blue-600 cursor-pointer">Add Item</button>
        
        </form>
    </div>
</div>

{{--Items section--}}
<div class="flex justify-between items-center mt-[30px] ">
    <h3 class="font-[600] mb-[10px]">Items</h3>

    <div class="flex items-center gap-[10px] mr-[15px] hover:text-green-500 cursor-pointer" id="add_item_open">
        <h3>Add Item</h3>
        <i class="fas fa-plus-square text-green-500 text-[2em]"></i>
    </div>

</div>

<table class="bg-[white] border border-gray-300 w-full rounded-lg min-w-[600px]">
    <thead>
        <tr class="font-[600] bg-blue-500 text-[white]">
            <td class="border-r border-gray-300 p-[7px_10px]">Item no.</td>
            <td class="border-r border-gray-300 p-[7px_10px]">Item name</td>
            <td class="border-r border-gray-300 p-[7px_10px]">Category</td>
            <td class="border-r border-gray-300 p-[7px_10px]">Quantity</td>
            <td class="border-r border-gray-300 p-[7px_10px]">Price</td>
            <td class="border-r border-gray-300 p-[7px_10px]">Original Price</td>
            <td class="p-[7px_10px]">Action</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($db_items as $item)
            <tr class="border-t border-gray-300">
                <td class="border-r border-gray-300 p-[7px_10px]">{{$item->id}}</td>
                <td class="border-r border-gray-300 p-[7px_10px]">{{$item->item_name}}</td>
                <td class="border-r border-gray-300 p-[7px_10px]">{{$item->category}}</td>
                <td class="border-r border-gray-300 p-[7px_10px]">{{$item->quantity}}</td>
                <td class="border-r border-gray-300 p-[7px_10px]">{{$item->price}}</td>
                <td class="border-r border-gray-300 p-[7px_10px]">{{$item->original_price}}</td>
                <td class="p-[7px_10px] flex items-center gap-[10px]">
                    <button class="hover:bg-green-500 bg-green-600 text-[white] p-[5px_10px] rounded-lg cursor-pointer"
                        onclick="updateItem(
                            '{{$item->id}}',
                            '{{$item->quantity}}',
                        )"
                    >Add stock</button>
                    <button 
                        class="hover:bg-red-400 bg-red-500 text-[white] p-[5px_10px] rounded-lg cursor-pointer"
                        onclick="deleteItem({{ $item->id }})"
                    >
                        Delete
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center p-4 text-gray-500">No items found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@if ($errors->any())
    <div id="error-toast" class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-50 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg transition-opacity duration-500 opacity-100">
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
                }, 500); 
            }
        }, 3500); 
    </script>
@endif

@if (session('success'))
    <div id="success-toast" class="fixed bottom-20 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg transition-opacity duration-500 opacity-100">
        <ul class="list-disc pl-5">
            @foreach ((array) session('success') as $success)
                <li>{{ $success }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('success-toast');
            if (toast) {
                toast.style.opacity = '0';
                setTimeout(() => {
                    toast.style.display = 'none';
                }, 700); 
            }
        }, 3500); 
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function updateItem(id, quantity) {
        Swal.fire({
            title: 'Add stock',
            html: `
                <div style="text-align:left">
                    <div style="margin-bottom:14px;">
                        <label for="swal-quantity" style="display:block;font-weight:600;font-size:0.97em;margin-bottom:4px;">Quantity to add</label>
                        <input id="swal-quantity" type="number" class="swal2-input" style="width:80%;margin-bottom:0;" placeholder="Quantity" min="1">
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#3b82f6',
            cancelButtonColor: '#22c55e',
            confirmButtonText: 'Save',
            cancelButtonText: 'Cancel',
            backdrop: false,
            background: '#fff',
            color: '#1e293b',
            focusConfirm: false,
            showClass: {
                popup: 'swal2-show swal2-animate swal2-animate-show-modal'
            },
            hideClass: {
                popup: 'swal2-hide swal2-animate swal2-animate-hide-modal'
            },
            preConfirm: () => {
                return {
                    id: id,
                    quantity: document.getElementById('swal-quantity').value,
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('update.item') }}";
                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                form.appendChild(csrf);

                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'item_id';
                idInput.value = result.value.id;
                form.appendChild(idInput);

                ['quantity'].forEach(field => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = field;
                    input.value = result.value[field];
                    form.appendChild(input);
                });

                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    function deleteItem(itemId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this item?",
            showCancelButton: true,
            confirmButtonColor: '#3b82f6',
            cancelButtonColor: '#F44336',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            backdrop: false,
            background: '#fff',
            color: '#1e293b',
            showClass: {
                popup: 'swal2-show swal2-animate swal2-animate-show-modal'
            },
            hideClass: {
                popup: 'swal2-hide swal2-animate swal2-animate-hide-modal'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('delete.item') }}";
                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';
                form.appendChild(csrf);
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'item_id';
                input.value = itemId;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>

@endsection