<x-layout>
    <x-slot:heading>
        Wishlist Page
    </x-slot:heading>

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
                            <th class="text-left font-semibold">Description</th>
                            <th class="text-left font-semibold">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img class="h-16 w-16 mr-4" src="{{ asset($wishlist->product->image) }}" alt="Image of {{ $wishlist->product->name }}">
                                    <span class="font-semibold">{{ $wishlist->product->name }}</span>
                                </div>
                            </td>
                            <td class="py-4">{{ $wishlist->product->price }} {{ $wishlist->product->currency }}</td>
                            <td class="py-4">{{ $wishlist->product->description }}</td>
                            <td class="py-4">
                                <form action="{{ route('wishlist.remove', $wishlist->product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Remove</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</x-layout>

