<x-layout>
    <x-slot:heading>
    </x-slot:heading>

    <div class="h-screen">
        <h1 class="dark:text-custom-dark-text text-2xl font-semibold mb-4">Your Wishlist</h1>
        @foreach($wishlists as $wishlist)
            <div class="py-8">
                <div class="container mx-auto px-4">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-4">
                        <table class="w-full">
                            <thead>
                            <tr>
                                <th class="dark:text-custom-dark-text text-left font-semibold">Game</th>
                                <th class="dark:text-custom-dark-text text-left font-semibold">Price</th>
                                <th class="dark:text-custom-dark-text text-left font-semibold">Description</th>
                                <th class="dark:text-custom-dark-text text-left font-semibold">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img class="dark:text-custom-dark-text h-16 w-16 mr-4" src="{{ asset('storage/images/' . $wishlist->product->image) }}" alt="Image of {{ $wishlist->product->name }}">
                                        <span class="dark:text-custom-dark-text font-semibold">{{ $wishlist->product->name }}</span>
                                    </div>
                                </td>
                                <td class="dark:text-custom-dark-text py-4">{{ $wishlist->product->price }} {{ $wishlist->product->currency }}</td>
                                <td class="dark:text-custom-dark-text py-4">{{ $wishlist->product->description }}</td>
                                <td class="dark:text-custom-dark-text py-4">
                                    <form action="{{ route('wishlist.remove', $wishlist->product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="wishlist-removed removeButton text-white bg-indigo-600 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>


