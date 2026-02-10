<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">Edit Setting</h1>
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
                            @if ($message = Session::get('success'))
                                <div
                                    class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded flex justify-between items-center">
                                    <span>{{ $message }}</span>
                                    <button onclick="this.parentElement.style.display='none'"
                                        class="text-green-700 font-bold">&times;</button>
                                </div>
                            @endif

                            <form action="{{ route('setting.update', $setting->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="mb-4">
                                    <label for="Email" class="block text-gray-700 font-semibold mb-2">Email</label>
                                    <input type="email"
                                        class="w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="email" name="email" value="{{ $setting->email }}" required>
                                    @error('email')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('phone') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="phone" name="phone" value="{{ $setting->phone }}" required>
                                    @error('phone')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('address') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="address" name="address" value="{{ $setting->address }}" required>
                                    @error('address')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="footer_heading" class="block text-gray-700 font-semibold mb-2">
                                        Footer Heading</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('footer_heading') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="footer_heading" name="footer_heading" value="{{ $setting->footer_heading }}"
                                        required>
                                    @error('footer_heading')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="footer_description"
                                        class="block text-gray-700 font-semibold mb-2">Footer
                                        Description</label>
                                    <textarea
                                        class="w-full px-4 py-2 border @error('footer_description') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="footer_description" name="footer_description" rows="5" required>{{ $setting->footer_description }}</textarea>
                                    @error('footer_description')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="logo" class="block text-gray-700 font-semibold mb-2">Logo</label>
                                    @if ($setting->logo)
                                        <div class="mb-3">
                                            <img src="{{ asset($setting->logo) }}" width="150" alt="Setting Logo"
                                                class="max-w-xs rounded">
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="w-full px-4 py-2 border @error('logo') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="logo" name="logo" accept="image/*">
                                    @error('logo')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="favicon" class="block text-gray-700 font-semibold mb-2">Favicon</label>
                                    @if ($setting->favicon)
                                        <div class="mb-3">
                                            <img src="{{ asset($setting->favicon) }}" width="150"
                                                alt="Setting Favicon" class="max-w-xs rounded">
                                        </div>
                                    @endif
                                    <input type="file"
                                        class="w-full px-4 py-2 border @error('favicon') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="favicon" name="favicon" accept="image/*">
                                    @error('favicon')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="facebook" class="block text-gray-700 font-semibold mb-2">Facebook
                                        Url</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('facebook') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="facebook" name="facebook" value="{{ $setting->facebook }}" required>
                                    @error('facebook')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="twitter" class="block text-gray-700 font-semibold mb-2">Twitter
                                        Url</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('twitter') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="twitter" name="twitter" value="{{ $setting->twitter }}" required>
                                    @error('twitter')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="linkedin" class="block text-gray-700 font-semibold mb-2">Linkedin
                                        Url</label>
                                    <input type="text"
                                        class="w-full px-4 py-2 border @error('linkedin') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="linkedin" name="linkedin" value="{{ $setting->linkedin }}" required>
                                    @error('linkedin')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="flex gap-3">
                                    <button type="submit" style="background-color: #9797df"
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md">Update
                                        Setting</button>
                                    <a href="{{ route('setting.index') }}" style="background-color: #e90e0e"
                                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-md">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </x-slot>


        </x-app-layout>
    </div>
</div>
