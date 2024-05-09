<x-layout>
    <x-slot:heading>
    </x-slot:heading>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-custom-dark-text text-2xl font-bold mb-6">Edit User</h2>
        <div class="dark:bg-custom-dark overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 dark:bg-custom-dark border-b border-gray-200">
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PUT') {{-- Ensure the method is PUT for the update --}}

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-custom-dark-text">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->first_name }} {{ $user->last_name }}" required class="mt-1 block w-full dark:bg-gray-700 text-custom-dark-text rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-custom-dark-text">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" required class="mt-1 block w-full dark:bg-gray-700 text-custom-dark-text rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-custom-dark-text">Role</label>
                        <input type="text" name="role" id="role" value="{{ $user->role }}" required class="mt-1 block w-full dark:bg-gray-700 text-custom-dark-text rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white font-bold rounded-md">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ route('admin.dashboard') }}" type="button" class="text-red-400 text-sm font-bold mt-5">Back</a>
    </div>
</x-layout>
