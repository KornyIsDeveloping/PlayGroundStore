<x-layout>
    <x-slot:heading>
        Wishlist Page
    </x-slot:heading>
    <form method="POST" action="{{ route('wishlist.add') }}" class="grid grid-rows-1 gap-4">
            @csrf
        <h1 class="text-2xl font-semibold mb-4">Your Wishlist</h1>
            @foreach($wishlists as $wishlist)
                <div class="py-8">
                    <div class="container mx-auto px-4">
                        <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                            <table class="w-full">
                                <thead>
                                <tr>
                                    <th class="text-left font-semibold">Game</th>
                                    <th class="text-left font-semibold">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 mr-4" src="https://via.placeholder.com/150" alt="Product image">
                                            <span class="font-semibold">{{ $wishlist->product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4">{{ $wishlist->product->price }} {{ $wishlist->product->currency }}</td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            {{ $wishlist->product->description }}
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded mr-2">Add to Cart</button>
                                <button class="addButton inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-product-id="{{ $product->id }}">Wishlist
                                    <svg class="w-[21px] h-[21px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                    </svg>
                                </button>
                                <button type="submit" class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </form>
</x-layout>
