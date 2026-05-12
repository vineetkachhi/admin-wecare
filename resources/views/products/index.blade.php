<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-900">Products</h1>
                        <a href="{{ route('products.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded-md">Add
                            Product</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div
                            class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded flex justify-between items-center">
                            <span>{{ $message }}</span>
                            <button onclick="this.parentElement.style.display='none'"
                                class="text-green-700 font-bold">&times;</button>
                        </div>
                    @endif

                    <form action="{{ route('products.bulkDelete') }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="mb-4">
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete selected products?')"
                                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                                Delete Selected
                            </button>
                        </div>

                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left">
                                            <input type="checkbox" id="selectAll">
                                        </th>
                                        <th class="px-6 py-3 text-left">ID</th>
                                        <th class="px-6 py-3 text-left">Product Name</th>
                                        <th class="px-6 py-3 text-left">Category</th>
                                        <th class="px-6 py-3 text-left">Slug</th>
                                        <th class="px-6 py-3 text-left">Status</th>
                                        <th class="px-6 py-3 text-left">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y">
                                    @forelse($products as $product)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4">
                                                <input type="checkbox"
                                                    name="ids[]"
                                                    value="{{ $product->id }}"
                                                    class="rowCheckbox">
                                            </td>

                                            <td class="px-6 py-4">{{ $product->id }}</td>
                                            <td class="px-6 py-4">{{ $product->product_name }}</td>
                                            <td class="px-6 py-4">{{ $product->category->category_name ?? '' }}</td>
                                            <td class="px-6 py-4">{{ $product->slug }}</td>

                                            <td class="px-6 py-4">
                                                <span
                                                    class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $product->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ ucfirst($product->status) }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 flex gap-2">
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold py-1 px-3 rounded text-sm">
                                                    Edit
                                                </a>

                                                <a href="#"
                                                onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $product->id }}').submit();"
                                                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded text-sm">
                                                    Delete
                                                </a>

                                                <form id="delete-form-{{ $product->id }}"
                                                    action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                                No products found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <script>
                    document.getElementById('selectAll').addEventListener('click', function () {
                        let checkboxes = document.querySelectorAll('.rowCheckbox');
                        checkboxes.forEach(cb => cb.checked = this.checked);
                    });
                    </script>

                </div>
            </x-slot>


        </x-app-layout>
    </div>
</div>
