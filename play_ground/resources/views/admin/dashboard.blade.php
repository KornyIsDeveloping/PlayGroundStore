<x-layout>
    <x-slot:heading>
    </x-slot:heading>

    <div class="h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="dark:text-custom-dark-text text-3xl font-bold mb-4">Admin Dashboard</h1>
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
