<x-layout>
    <x-slot:heading>
    </x-slot:heading>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-custom-dark-text text-2xl font-bold mb-6">Create New User</h2>
            <div class="dark:bg-custom-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 dark:bg-custom-dark border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-custom-dark-text">Name</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full dark:bg-gray-800 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-custom-dark-text">Email</label>
                            <input type="email" name="email" id="email" required class="mt-1 block w-full dark:bg-gray-800 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-custom-dark-text">Password</label>
                            <input type="password" name="password" id="password" required class="mt-1 block w-full dark:bg-gray-800 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md">
                                Create User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <a href="{{ route('admin.dashboard') }}" type="button" class="text-red-400 text-sm font-bold mt-5">Back</a>
</x-layout>
