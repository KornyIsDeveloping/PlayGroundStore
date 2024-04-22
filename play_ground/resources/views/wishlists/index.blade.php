<x-layout>
    <x-slot:heading>
        Wishlist Page
    </x-slot:heading>
    @foreach ($wishlists as $wishlist)
        <div>
            <h2>{{ $wishlist->product->name }}</h2>
            <p>{{ $wishlist->product->description }}</p>
            <p>Price: {{ $wishlist->product->price }} {{ $wishlist->product->currency }}</p>
            <p> User: {{ $wishlist->user->first_name }}</p>
        </div>
    @endforeach
</x-layout>
