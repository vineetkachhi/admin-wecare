<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-900">Blogs</h1>
                        <a href="{{ route('blogs.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded-md">Add
                            Blog</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div
                            class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded flex justify-between items-center">
                            <span>{{ $message }}</span>
                            <button onclick="this.parentElement.style.display='none'"
                                class="text-green-700 font-bold">&times;</button>
                        </div>
                    @endif

                    <form action="{{ route('blogs.bulkDelete') }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="mb-4">
                            <button type="submit" onclick="return confirm('Delete selected blogs?')"
                                class="bg-red-600 text-white px-4 py-2 rounded">
                                Delete Selected
                            </button>
                        </div>

                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="px-6 py-3">
                                            <input type="checkbox" id="selectAll">
                                        </th>
                                        <th class="px-6 py-3">ID</th>
                                        <th class="px-6 py-3">Title</th>
                                        <th class="px-6 py-3">Slug</th>
                                        <th class="px-6 py-3">Status</th>
                                        <th class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td class="px-6 py-4">
                                                <input type="checkbox" name="ids[]" value="{{ $blog->id }}"
                                                    class="rowCheckbox">
                                            </td>

                                            <td class="px-6 py-4">{{ $blog->id }}</td>
                                            <td class="px-6 py-4">{{ $blog->title }}</td>
                                            <td class="px-6 py-4">{{ $blog->slug }}</td>
                                            <td class="px-6 py-4">{{ $blog->status }}</td>

                                            <td class="px-6 py-4">
                                                <a href="{{ route('blogs.edit', $blog->id) }}"
                                                    class="bg-yellow-500 px-3 py-1 rounded">
                                                    Edit
                                                </a>

                                                <a href="{{ route('blogs.destroy', $blog->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-{{ $blog->id }}').submit();"
                                                    class="bg-red-600 text-white px-3 py-1 rounded">
                                                    Delete
                                                </a>

                                                <form id="delete-{{ $blog->id }}"
                                                    action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <script>
                        document.getElementById('selectAll').onclick = function() {
                            document.querySelectorAll('.rowCheckbox').forEach(cb => {
                                cb.checked = this.checked;
                            });
                        }
                    </script>
                </div>
            </x-slot>


        </x-app-layout>
    </div>
</div>
