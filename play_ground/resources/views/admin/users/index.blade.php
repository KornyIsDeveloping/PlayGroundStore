{{--<x-layout>--}}
{{--    <x-slot:heading>--}}
{{--    </x-slot:heading>--}}

{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-6">--}}
{{--        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-600 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring focus:ring-green-200 disabled:opacity-25 transition">--}}
{{--            Add New User--}}
{{--        </a>--}}
{{--        <div class="flex flex-col mt-8">--}}
{{--            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
{{--                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">--}}
{{--                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">--}}
{{--                        <table class="min-w-full divide-y divide-gray-200">--}}
{{--                            <thead class="bg-gray-50">--}}
{{--                            <tr>--}}
{{--                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                    Email--}}
{{--                                </th>--}}
{{--                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                    Name--}}
{{--                                </th>--}}
{{--                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                    Role--}}
{{--                                </th>--}}
{{--                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                    Status--}}
{{--                                </th>--}}
{{--                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                    Actions--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--                            @foreach ($users as $user)--}}
{{--                                <tr>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                        {{ $user->email }}--}}
{{--                                    </td>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                        {{ $user->name }}--}}
{{--                                    </td>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                        {{ $user->role }}--}}
{{--                                    </td>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap">--}}
{{--                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $user->is_active ? 'green' : 'red' }}-100 text-{{ $user->is_active ? 'green' : 'red' }}-800">--}}
{{--                                            {{ $user->is_active ? 'Active' : 'Inactive' }}--}}
{{--                                        </span>--}}
{{--                                    </td>--}}
{{--                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">--}}
{{--                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
{{--                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="inline">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Delete</button>--}}
{{--                                        </form>--}}
{{--                                        <form method="POST" action="{{ route('admin.users.toggleStatus', $user->id) }}" class="inline">--}}
{{--                                            @csrf--}}
{{--                                            @method('PATCH')--}}
{{--                                            <button type="submit" class="text-gray-600 hover:text-gray-900 ml-4">--}}
{{--                                                {{ $user->is_active ? 'Deactivate' : 'Activate' }}--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-layout>--}}

<x-layout>
    <x-slot:heading>
    </x-slot:heading>

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
</x-layout>


