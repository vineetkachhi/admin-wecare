<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">Edit Testimonial</h1>
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

                            <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')



                                <div class="mb-4">
                                    <label for="client_name" class="block text-gray-700 font-semibold mb-2">Client
                                        Name</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('client_name') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="client_name" name="client_name" value="{{ $testimonial->client_name }}"
                                        required>
                                    @error('client_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="client_location" class="block text-gray-700 font-semibold mb-2">Client
                                        Location</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('client_location') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="client_location" name="client_location"
                                        value="{{ $testimonial->client_location }}" required>
                                    @error('client_location')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 font-semibold mb-2">Long
                                        Description</label>
                                    <textarea
                                        class="w-full px-4 py-2 border @error('message') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="summernote" name="message" rows="6" required>{{ $testimonial->message }}</textarea>
                                    @error('message')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="mb-4">
                                    <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                                    @if ($testimonial->image)
                                        <div class="mb-3">
                                            <img src="{{ asset($testimonial->image) }}" style="width: 50px"
                                                alt="Testimonial Image" class="max-w-xs rounded">
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
                                        <option value="active"
                                            {{ $testimonial->status == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="inactive"
                                            {{ $testimonial->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="flex gap-3 mt-6">
                                    <button type="submit" style="background-color: #9797df"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md">Update
                                        Testimonial</button>
                                    <a href="{{ route('testimonial.index') }}" style="background-color: #e90e0e"
                                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-md">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
    </x-slot>


    </x-app-layout>
</div>
</div>
