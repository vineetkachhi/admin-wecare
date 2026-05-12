<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Categories Card -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600 text-sm">Total Categories</p>
                                            <p class="text-3xl font-bold text-blue-600">
                                                {{ \App\Models\Category::count() }}
                                            </p>
                                        </div>
                                        <i class="fas fa-list text-4xl text-blue-200"></i>
                                    </div>
                                    <a href="{{ route('categories.index') }}"
                                        class="mt-4 inline-block text-blue-600 hover:text-blue-800">View All →</a>
                                </div>
                            </div>

                            <!-- Products Card -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600 text-sm">Total Products</p>
                                            <p class="text-3xl font-bold text-green-600">
                                                {{ \App\Models\Product::count() }}
                                            </p>
                                        </div>
                                        <i class="fas fa-box text-4xl text-green-200"></i>
                                    </div>
                                    <a href="{{ route('products.index') }}"
                                        class="mt-4 inline-block text-green-600 hover:text-green-800">View All →</a>
                                </div>
                            </div>

                            <!-- FAQs Card -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600 text-sm">Total FAQs</p>
                                            <p class="text-3xl font-bold text-yellow-600">{{ \App\Models\Faq::count() }}
                                            </p>
                                        </div>
                                        <i class="fas fa-question-circle text-4xl text-yellow-200"></i>
                                    </div>
                                    <a href="{{ route('faqs.index') }}"
                                        class="mt-4 inline-block text-yellow-600 hover:text-yellow-800">View All →</a>
                                </div>
                            </div>

                            <!-- Blogs Card -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600 text-sm">Total Blogs</p>
                                            <p class="text-3xl font-bold text-purple-600">
                                                {{ \App\Models\Blog::count() }}
                                            </p>
                                        </div>
                                        <i class="fas fa-blog text-4xl text-purple-200"></i>
                                    </div>
                                    <a href="{{ route('blogs.index') }}"
                                        class="mt-4 inline-block text-purple-600 hover:text-purple-800">View All →</a>
                                </div>
                            </div>
                            <!-- Testimonials Card -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600 text-sm">Total Testimonials</p>
                                            <p class="text-3xl font-bold text-purple-600">
                                                {{ \App\Models\Testimonial::count() }}
                                            </p>
                                        </div>
                                        <i class="fas fa-comment-alt text-4xl text-purple-200"></i>
                                    </div>
                                    <a href="{{ route('testimonial.index') }}"
                                        class="mt-4 inline-block text-purple-600 hover:text-purple-800">View All →</a>
                                </div>
                            </div>

                            <!-- Popular Works Card -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600 text-sm">Total Popular Works</p>
                                            <p class="text-3xl font-bold text-purple-600">
                                                {{ \App\Models\Popular_Work::count() }}
                                            </p>
                                        </div>
                                        <i class="fas fa-briefcase  text-4xl text-purple-200"></i>
                                    </div>
                                    <a href="{{ route('popular_work.index') }}"
                                        class="mt-4 inline-block text-purple-600 hover:text-purple-800">View All →</a>
                                </div>
                            </div>

                            <!-- Experience Card -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600 text-sm">Total Experience</p>
                                            <p class="text-3xl font-bold text-purple-600">
                                                {{ \App\Models\Experience::count() }}
                                            </p>
                                        </div>
                                        <i class="fas fa-user-tie  text-4xl text-purple-200"></i>
                                    </div>
                                    <a href="{{ route('experience.index') }}"
                                        class="mt-4 inline-block text-purple-600 hover:text-purple-800">View All →</a>
                                </div>
                            </div>
                            <!-- Contact Card -->
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-gray-600 text-sm">Total Contact</p>
                                            <p class="text-3xl font-bold text-purple-600">
                                                {{ \App\Models\Contact::count() }}
                                            </p>
                                        </div>
                                        <i class="fas fa-envelope  text-4xl text-purple-200"></i>
                                    </div>
                                    <a href="{{ route('contacts.index') }}"
                                        class="mt-4 inline-block text-purple-600 hover:text-purple-800">View All →</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </x-slot>


        </x-app-layout>
    </div>
</div>
