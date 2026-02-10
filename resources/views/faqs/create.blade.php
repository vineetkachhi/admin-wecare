<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">Add FAQ</h1>
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

                            <form action="{{ route('faqs.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="description"
                                        class="block text-gray-700 font-semibold mb-2">Description</label>
                                    <textarea
                                        class="w-full px-4 py-2 border @error('description') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                                    <select
                                        class="w-full px-4 py-2 border @error('status') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="status" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex gap-3">
                                    <button type="submit" style="background-color: #9797df"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md">Create
                                        FAQ</button>
                                    <a href="{{ route('faqs.index') }}" style="background-color: #e90e0e"
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
