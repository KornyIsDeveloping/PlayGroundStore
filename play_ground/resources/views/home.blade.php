<x-layout>
    <x-slot:heading>
    </x-slot:heading>

    <div class="h-screen">
        <div class="relative max-w-xl mx-auto mt-20">
            <img class="h-64 w-full object-cover rounded-md" src="https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=2342&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Retro gaming room">
            <div class="absolute inset-0 bg-gray-700 opacity-60 rounded-md"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <h2 class="text-white text-3xl font-bold">Play Ground Store</h2>
            </div>
        </div>
        <div class="w-full flex justify-center items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:py-24 lg:px-8">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-4 mt-4">

                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-800">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total users</dt>
                                <dd id="totalUsers" class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $initialStats['totalUsers'] ?? 'Loading...' }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-800">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class=" text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Our games</dt>
                                <dd id="totalProducts" class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $initialStats['totalProducts'] ?? 'Loading...' }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-800">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Last added game</dt>
                                <dd id="recentProducts" class="mt-1 text-2l leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $initialStats['recentProducts'] ?? 'Loading...' }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-800">
                        <div class="px-4 py-5 sm:p-6">
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Comments
                                </dt>
                                <dd id="totalComments" class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">{{ $initialStats['totalComments'] ?? 'Loading...' }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


