
{{--<x-layout>--}}
{{--    <x-slot:heading>--}}
{{--        Wishlist Pageekhklhlkjhjk--}}
{{--    </x-slot:heading>--}}
{{--    <form method="POST" action="{{ route('wishlist.add') }}" class="grid grid-rows-1 gap-4">--}}
{{--        @csrf--}}
{{--        @foreach($wishlists as $wishlist)--}}
{{--            <div class="py-8">--}}
{{--                <div class="container mx-auto px-4">--}}
{{--                    <h1 class="text-2xl font-semibold mb-4">Your Wishlist</h1>--}}
{{--                    @foreach($wishlist->products as $product)  <!-- Ensure this relationship exists -->--}}
{{--                    <div class="bg-white rounded-lg shadow-md p-6 mb-4">--}}
{{--                        <table class="w-full">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th class="text-left font-semibold">Game</th>--}}
{{--                                <th class="text-left font-semibold">Price</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td class="py-4">--}}
{{--                                    <div class="flex items-center">--}}
{{--                                        <img class="h-16 w-16 mr-4" src="https://via.placeholder.com/150" alt="Product image">--}}
{{--                                        <span class="font-semibold">{{ $product->name }}</span>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="py-4">{{ $product->price }} {{ $product->currency }}</td>--}}
{{--                                <td class="py-4">--}}
{{--                                    <div class="flex items-center">--}}
{{--                                         additional information about the game--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <div class="flex justify-end">--}}
{{--                            <button type="submit" class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded mr-2">Add to Cart</button>--}}
{{--                            <button type="submit" class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Remove</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </form>--}}
{{--</x-layout>--}}
