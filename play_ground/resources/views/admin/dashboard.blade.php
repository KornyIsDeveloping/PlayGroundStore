<x-layout>
    <x-slot:heading>
    </x-slot:heading>

    <div class="h-screen">
        <nav class="bg-custom-light dark:bg-custom-dark">
            <ul class="flex list-none m-0">
                <li class="mr-2">
                    <a href="{{ route('admin.users.index') }}" class="bg-indigo-600 text-white py-2 px-4 rounded">Manage Users</a>
                </li>
                <li>
                    <a href="{{ route('admin.users.create') }}" class="bg-indigo-600 text-white py-2 px-4 rounded">Add New User</a>
                </li>
            </ul>
        </nav>
        <div class="container mx-auto px-4 py-8">
            <h1 class="dark:text-custom-dark-text text-3xl font-bold mb-5">Admin Dashboard</h1>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">User Email</th>
                        <th scope="col" class="py-3 px-6">Comments</th>
                        <th scope="col" class="py-3 px-6">Admin</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6">{{ $user->email }}</td>
                            <td class="py-4 px-6">
                                @foreach ($user->comments as $comment)
                                    <div>{{ $comment->body }}</div>
                                @endforeach
                            </td>
                            <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
