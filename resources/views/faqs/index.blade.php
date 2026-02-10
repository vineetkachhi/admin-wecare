<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-900">FAQs</h1>
                        <a href="{{ route('faqs.create') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-black font-semibold py-2 px-4 rounded-md">Add
                            FAQ</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div
                            class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded flex justify-between items-center">
                            <span>{{ $message }}</span>
                            <button onclick="this.parentElement.style.display='none'"
                                class="text-green-700 font-bold">&times;</button>
                        </div>
                    @endif

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left">ID</th>
                                    <th class="px-6 py-3 text-left">Name</th>
                                    <th class="px-6 py-3 text-left">Description</th>
                                    <th class="px-6 py-3 text-left">Status</th>
                                    <th class="px-6 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($faqs as $faq)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">{{ $faq->id }}</td>
                                        <td class="px-6 py-4">{{ $faq->name }}</td>
                                        <td class="px-6 py-4">
                                            {{ \Illuminate\Support\Str::limit($faq->description, 100) }}</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="inline-block px-3 py-1 rounded-full text-sm font-semibold {{ $faq->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($faq->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 flex gap-2">
                                            <a href="{{ route('faqs.edit', $faq->id) }}"
                                                class="bg-green-600 hover:bg-yellow-600 text-black font-semibold py-1 px-3 rounded text-sm">Edit</a>
                                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded text-sm"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No FAQs found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </x-slot>


        </x-app-layout>
    </div>
</div>
