<x-layout>
    <x-slot:heading>
    </x-slot:heading>
    <div class="h-screen">
        <div class="container mx-auto px-4">
            <h1 class="dark:text-custom-dark-text text-2xl font-semibold mb-4">Confirm Your Order</h1>
            <div class="dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="dark:text-custom-dark-text text-xl mb-4">Order Summary</h2>
                @foreach($carts as $cart)
                    <div class="dark:text-custom-dark-text flex justify-between items-center mb-2">
                        <span>{{ $cart->product->name }} - ${{ number_format($cart->product->price, 2) }}</span>
                        <span>€ {{ number_format($cart->product->price, 2) }}</span>
                    </div>
                @endforeach
                <div class="dark:text-custom-dark-text flex justify-between items-center font-bold">
                    <span>Total:</span>
                    <span>€ {{ number_format($totalPrice, 2) }}</span>
                </div>
                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-4 dark:text-custom-dark-text py-2 px-4 rounded-lg">Proceed to Pay</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
