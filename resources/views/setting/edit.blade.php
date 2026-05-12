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
                                        id="summernote" name="footer_description" rows="5" required>{{ $setting->footer_description }}</textarea>
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

                                <div class="border-t pt-6 mt-6">
                                    <h2 class="text-2xl font-bold text-gray-900 mb-4">First Section</h2>
                                    <div class="mb-4">
                                        <label for="first_heading" class="block text-gray-700 font-semibold mb-2">
                                            First Heading</label>

                                        <input type="text"
                                            class="w-full px-4 py-2 border @error('first_heading') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="first_heading" name="first_heading"
                                            value="{{ $setting->first_heading }}" required>
                                        @error('first_heading')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="secound_heading" class="block text-gray-700 font-semibold mb-2">
                                            Second Heading</label>

                                        <input type="text"
                                            class="w-full px-4 py-2 border @error('second_heading') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="second_heading" name="second_heading"
                                            value="{{ $setting->second_heading }}" required>
                                        @error('second_heading')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="section_one_description"
                                            class="block text-gray-700 font-semibold mb-2">
                                            Description</label>

                                        <textarea
                                            class="w-full px-4 py-2 border @error('section_one_content') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="sectionOneDescription" name="section_one_content" rows="5" required>{{ $setting->section_one_content }}</textarea>
                                        @error('section_one_content')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="section_one_image"
                                            class="block text-gray-700 font-semibold mb-2">Image or video</label>
                                        @if ($setting->section_one_image)
                                            @php
                                                $file = $setting->section_one_image;
                                                $extension = pathinfo($file, PATHINFO_EXTENSION);
                                            @endphp

                                            <div class="mb-3">
                                                @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                    <img src="{{ asset($file) }}" width="150"
                                                        alt="Section One Image" class="max-w-xs rounded">
                                                @elseif (in_array(strtolower($extension), ['mp4', 'mov', 'avi', 'webm']))
                                                    <video width="200" controls class="rounded">
                                                        <source src="{{ asset($file) }}"
                                                            type="video/{{ $extension }}">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @endif
                                            </div>
                                        @endif

                                        <input type="file"
                                            class="w-full px-4 py-2 border @error('section_one_image') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            id="section_one_image" name="section_one_image" accept="image/*,video/*">
                                        @error('section_one_image')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="border-t pt-6 mt-6">
                                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Experience Section</h2>
                                        <div class="mb-4">
                                            <label for="experience_heading"
                                                class="block text-gray-700 font-semibold mb-2">
                                                Experience Heading</label>

                                            <textarea
                                                class="w-full px-4 py-2 border @error('experience_heading') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                id="summernoteHeading" name="experience_heading" rows="5" required>{{ $setting->experience_heading }}</textarea>

                                            @error('experience_heading')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="experience_description"
                                                class="block text-gray-700 font-semibold mb-2">
                                                Experience Description</label>
                                            <textarea
                                                class="w-full px-4 py-2 border @error('experience_description') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                id="summernoteDescription" name="experience_description" rows="5" required>{{ $setting->experience_description }}</textarea>
                                            @error('experience_description')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="experience_image"
                                                class="block text-gray-700 font-semibold mb-2">Experience Image</label>
                                            @if ($setting->experience_image)
                                                <div class="mb-3">
                                                    <img src="{{ asset($setting->experience_image) }}" width="150"
                                                        alt="Experience Image" class="max-w-xs rounded">

                                                </div>
                                            @endif

                                            <input type="file"
                                                class="w-full px-4 py-2 border @error('experience_image') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                id="experience_image" name="experience_image"
                                                accept="image/*,video/*">
                                            @error('experience_image')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="border-t pt-6 mt-6">
                                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Testimonial Section</h2>
                                        <div class="mb-4">
                                            <label for="testimonial_heading"
                                                class="block text-gray-700 font-semibold mb-2">
                                                Testimonial Heading</label>

                                            <textarea
                                                class="w-full px-4 py-2 border @error('testimonial_heading') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                id="testimonialHeading" name="testimonial_heading" rows="5" required>{{ $setting->testimonial_heading }}</textarea>

                                            @error('testimonial_heading')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="border-t pt-6 mt-6">
                                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Popular Section</h2>
                                        <div class="mb-4">
                                            <label for="popular_heading"
                                                class="block text-gray-700 font-semibold mb-2">
                                                Popular Heading</label>

                                            <textarea
                                                class="w-full px-4 py-2 border @error('popular_heading') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                name="popular_heading" rows="5" required>{{ $setting->popular_heading }}</textarea>

                                            @error('popular_heading')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
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
