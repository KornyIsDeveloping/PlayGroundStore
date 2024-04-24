<x-layout>
    <x-slot:heading>
        Cart Page
    </x-slot:heading>
    <div class="h-screen py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-4">Your cart</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                        <table class="w-full">
                            <thead>
                            <tr>
                                <th class="text-left font-semibold">Game</th>
                                <th class="text-left font-semibold">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $carts as $cart)
                            <tr>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img class="h-16 w-16 mr-4" src="{{ asset($cart->product->image) }}" alt="{{ $cart->product->name }}">
                                        <span class="font-semibold">{{ $cart->product->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4">{{ $cart->product->price }} {{ $cart->product->currency }}</td>
                                <td class="py-4">
                                </td>
                                <td class="py-4"></td>
                            </tr>
                            <!-- More product rows -->
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
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">Total</span>
                            <span class="font-semibold">${{ number_format($totalPrice, 2) }}</span>
                        </div>
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
