<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">Edit Product</h1>
                            <hr class="mb-6">

                            @if ($errors->any())
                                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                                    <ul class="list-disc pl-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="category_id"
                                        class="block text-gray-700 font-semibold mb-2">Category</label>
                                    <select
                                        class="w-full px-4 py-2 border @error('category_id') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="category_id" name="category_id" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="product_name" class="block text-gray-700 font-semibold mb-2">Product
                                        Name</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('product_name') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="product_name" name="product_name" value="{{ $product->product_name }}"
                                        required>
                                    @error('product_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('slug') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="slug" name="slug" value="{{ $product->slug }}" required>
                                    @error('slug')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="short_description" class="block text-gray-700 font-semibold mb-2">Short
                                        Description</label>
                                    <textarea
                                        class="w-full px-4 py-2 border @error('short_description') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="short_description" name="short_description" rows="3" required>{{ $product->short_description }}</textarea>
                                    @error('short_description')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="long_description" class="block text-gray-700 font-semibold mb-2">Long
                                        Description</label>
                                    <textarea
                                        class="w-full px-4 py-2 border @error('long_description') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="long_description" name="long_description" rows="5" required>{{ $product->long_description }}</textarea>
                                    @error('long_description')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                                    @if ($product->image)
                                        <div class="mb-3">
                                            <img src="{{ asset($product->image) }}" width="150" alt="Product Image"
                                                class="max-w-xs rounded">
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="w-full px-4 py-2 border @error('image') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="image" name="image" accept="image/*">
                                    @error('image')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                                    <select
                                        class="w-full px-4 py-2 border @error('status') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="status" name="status" required>
                                        <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive"
                                            {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit" style="background-color: #9797df"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md">Update
                                        Product</button>
                                    <a href="{{ route('products.index') }}" style="background-color: #e90e0e"
                                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-md">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </x-slot>


        </x-app-layout>
    </div>
</div>
