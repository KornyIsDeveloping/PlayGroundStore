<x-layout>
    <x-slot:heading>
    </x-slot:heading>
    <div class="h-screen py-8">
        <div class="container mx-auto px-4">
            <h1 class="dark:text-custom-dark-text text-2xl font-semibold mb-4">Your cart</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-4">
                        <table class="w-full">
                            <thead>
                            <tr>
                                <th class="dark:text-custom-dark-text text-left font-semibold">Game</th>
                                <th class="dark:text-custom-dark-text text-left font-semibold">Price</th>
                                <th class="dark:text-custom-dark-text text-left font-semibold">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $carts as $cart)
                                <tr>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img class="dark:text-custom-dark-text h-16 w-16 mr-4" src="{{ asset($cart->product->image) }}" alt="{{ $cart->product->name }}">
                                            <span class="dark:text-custom-dark-text font-semibold">{{ $cart->product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="dark:text-custom-dark-text py-4">{{ $cart->product->price }} {{ $cart->product->currency }}</td>
                                    <td class="dark:text-custom-dark-text py-4">
                                        <form action="{{ route('cart.remove', $cart->product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @php
                    $totalPrice = 0;
                    foreach ($carts as $cart) {
                        $totalPrice += $cart->product->price;
                    }
                @endphp
                <div class="md:w-1/4">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                        <h2 class="dark:text-custom-dark-text text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between mb-2">
                            <span class="dark:text-custom-dark-text font-semibold">Total</span>
                            <span class="dark:text-custom-dark-text font-semibold">${{ number_format($totalPrice, 2) }}</span>
                        </div>
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
