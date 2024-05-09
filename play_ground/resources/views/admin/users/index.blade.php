<x-layout>
    <x-slot:heading>
    </x-slot:heading>

        <div class="h-screen">
            <div class=" w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex justify-between items-center pb-4">
                    <div>
                        <h1 class="dark:text-custom-dark-text text-3xl font-bold mb-4">Manage Users</h1>
                    </div>
                </div>
                <div class="sm:rounded-lg">
                    <table class="w-full  divide-gray-200">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="dark:bg-custom-dark divide-y divide-gray-300">
                        @foreach ($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-custom-dark-text">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-custom-dark-text">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-custom-dark-text">
                                    {{ $user->role }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-custom-dark-text">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 mr-4">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-600">Delete</button>
                                    </form>
                                    <form action="{{ route('admin.users.toggleStatus', $user->id) }}" method="POST" class="inline ml-4">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-gray-600 hover:text-custom-dark-text">
                                            {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('admin.dashboard') }}" type="button" class="text-red-400 text-sm font-bold mt-5">Back</a>
        </div>
</x-layout>


