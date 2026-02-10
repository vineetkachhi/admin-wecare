<!-- Sidebar Navigation Component -->
<style>
    aside>nav>a>i {
        margin: 10px
    }
</style>
<aside class="w-64 bg-gray-900 text-white p-6">
    <div class="mb-8">
        <h2 class="text-2xl font-bold">Admin Panel</h2>
    </div>

    <nav class="space-y-2" style="color: black;">
        <a href="{{ route('dashboard') }}"
            class="block  px-4 py-2 rounded-md hover:bg-gray-700 transition {{ request()->routeIs('dashboard') ? 'bg-blue-600' : '' }}">
            <i class="fas fa-home mr-2"></i>Dashboard
        </a>

        <a href="{{ route('categories.index') }}"
            class="block px-4 py-2 rounded-md hover:bg-gray-700 transition {{ request()->routeIs('categories.*') ? 'bg-blue-600' : '' }}">
            <i class="fas fa-list mr-2"></i>Categories
        </a>

        <a href="{{ route('products.index') }}"
            class="block px-4 py-2 rounded-md hover:bg-gray-700 transition {{ request()->routeIs('products.*') ? 'bg-blue-600' : '' }}">
            <i class="fas fa-box mr-2"></i>Products
        </a>

        <a href="{{ route('faqs.index') }}"
            class="block px-4 py-2 rounded-md hover:bg-gray-700 transition {{ request()->routeIs('faqs.*') ? 'bg-blue-600' : '' }}">
            <i class="fas fa-question-circle mr-2"></i>FAQs
        </a>

        <a href="{{ route('blogs.index') }}"
            class="block px-4 py-2 rounded-md hover:bg-gray-700 transition {{ request()->routeIs('blogs.*') ? 'bg-blue-600' : '' }}">
            <i class="fas fa-blog mr-2"></i>Blogs
        </a>


        <a href="{{ route('setting.index') }}"
            class="block px-4 py-2 rounded-md hover:bg-gray-700 transition {{ request()->routeIs('settings.*') ? 'bg-blue-600' : '' }}">
            <i class="fas fa-cog mr-2"></i>Settings
        </a>
    </nav>
</aside>
