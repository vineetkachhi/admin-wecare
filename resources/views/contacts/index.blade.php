<div class="flex">
    <x-sidebar />
    <div class="flex-1">
        <x-app-layout>
            <x-slot name="header">
                {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Contacts') }}
                </h2> --}}
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-3xl font-bold text-gray-900">Contacts</h1>

                        </div>

                        @if ($message = Session::get('success'))
                            <div
                                class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded flex justify-between items-center">
                                <span>{{ $message }}</span>
                                <button onclick="this.parentElement.style.display='none'"
                                    class="text-green-700 font-bold">&times;</button>
                            </div>
                        @endif



                        <style>
                            /* Force table text visible for debugging */
                            .categories-debug,
                            .categories-debug td,
                            .categories-debug th {
                                color: #000 !important;
                            }

                            .categories-debug tr {
                                border: 1px solid #e5e7eb;
                            }
                        </style>

                        <div class="bg-white rounded-lg shadow overflow-hidden">

                            {{-- Multiple Delete Form --}}
                            <form action="{{ route('contacts.bulkDelete') }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete selected records?')">
                                @csrf
                                @method('DELETE')

                                <div class="p-4">
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                                        Delete Selected
                                    </button>
                                </div>

                                <table class="w-full">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="px-6 py-3 text-left">
                                                <input type="checkbox" id="selectAll">
                                            </th>
                                            <th class="px-6 py-3 text-left">ID</th>
                                            <th class="px-6 py-3 text-left">Name</th>
                                            <th class="px-6 py-3 text-left">Email</th>
                                            <th class="px-6 py-3 text-left">Message</th>
                                            <th class="px-6 py-3 text-left">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y">
                                        @forelse($contacts as $contact)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4">
                                                    <input type="checkbox" name="ids[]" value="{{ $contact->id }}"
                                                        class="checkbox">
                                                </td>

                                                <td class="px-6 py-4">{{ $contact->id }}</td>
                                                <td class="px-6 py-4">{{ strtoupper($contact->name) }}</td>
                                                <td class="px-6 py-4">{{ $contact->email }}</td>
                                                <td class="px-6 py-4">{{ $contact->message }}</td>

                                                <td class="px-6 py-4">
                                                    <form action="{{ route('contacts.destroy', $contact->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded text-sm"
                                                            onclick="return confirm('Are you sure?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                                    No contacts found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </form>
                        </div>

                        <script>
                            document.getElementById('selectAll').addEventListener('click', function() {
                                let checkboxes = document.querySelectorAll('.checkbox');
                                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                            });
                        </script>

                    </div>
                </div>
            </x-slot>


        </x-app-layout>
    </div>
</div>
