<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">Edit Category</h1>
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

                            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="category_name" class="block text-gray-700 font-semibold mb-2">Category
                                        Name</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('category_name') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="category_name" name="category_name" value="{{ $category->category_name }}"
                                        required>
                                    @error('category_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('slug') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="slug" name="slug" value="{{ $category->slug }}" required>
                                    @error('slug')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                                    <select
                                        class="w-full px-4 py-2 border @error('status') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="status" name="status" required>
                                        <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive"
                                            {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit" style="background-color: #9797df"
                                        class="bg-blue-600 hover:bg-blue-700 text-black border border-blue-700 font-semibold py-2 px-6 rounded-md">Update
                                        Category</button>
                                    <a href="{{ route('categories.index') }}" style="background-color: #e90e0e"
                                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-md">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-app-layout>
    </div>
</div>
