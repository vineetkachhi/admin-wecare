<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">Edit Blog</h1>
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

                            <form action="{{ route('blogs.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="title" class="block text-gray-700 font-semibold mb-2">Blog
                                        Title</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('title') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="title" name="title" value="{{ $blog->title }}" required>
                                    @error('title')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="slug" class="block text-gray-700 font-semibold mb-2">Slug</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('slug') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="slug" name="slug" value="{{ $blog->slug }}" required>
                                    @error('slug')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="short_description" class="block text-gray-700 font-semibold mb-2">Short
                                        Description</label>
                                    <textarea
                                        class="w-full px-4 py-2 border @error('short_description') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="short_description" name="short_description" rows="3" required>{{ $blog->short_description }}</textarea>
                                    @error('short_description')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="long_description" class="block text-gray-700 font-semibold mb-2">Long
                                        Description</label>
                                    <textarea
                                        class="w-full px-4 py-2 border @error('long_description') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="long_description" name="long_description" rows="6" required>{{ $blog->long_description }}</textarea>
                                    @error('long_description')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                                    @if ($blog->image)
                                        <div class="mb-3">
                                            <img src="{{ Storage::url($blog->image) }}" alt="Blog Image"
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

                                <div class="mb-4">
                                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                                    <select
                                        class="w-full px-4 py-2 border @error('status') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="status" name="status" required>
                                        <option value="active" {{ $blog->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $blog->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="border-t pt-6 mt-6">
                                    <h2 class="text-2xl font-bold text-gray-900 mb-4">SEO Settings</h2>

                                    <div class="mb-4">
                                        <label for="seo_title" class="block text-gray-700 font-semibold mb-2">SEO
                                            Title</label>
                                        <input type="text"
                                            class="w-full px-4 py-2 border @error('seo_title') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="seo_title" name="seo_title" value="{{ $blog->seo_title }}"
                                            placeholder="Max 255 characters">
                                        @error('seo_title')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="seo_description" class="block text-gray-700 font-semibold mb-2">SEO
                                            Description</label>
                                        <textarea
                                            class="w-full px-4 py-2 border @error('seo_description') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="seo_description" name="seo_description" rows="3" placeholder="Max 500 characters">{{ $blog->seo_description }}</textarea>
                                        @error('seo_description')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label for="seo_meta_tag" class="block text-gray-700 font-semibold mb-2">SEO
                                            Meta Tags</label>
                                        <textarea
                                            class="w-full px-4 py-2 border @error('seo_meta_tag') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="seo_meta_tag" name="seo_meta_tag" rows="3" placeholder="Comma separated keywords">{{ $blog->seo_meta_tag }}</textarea>
                                        @error('seo_meta_tag')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex gap-3 mt-6">
                                    <button type="submit" style="background-color: #9797df"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md">Update
                                        Blog</button>
                                    <a href="{{ route('blogs.index') }}" style="background-color: #e90e0e"
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
