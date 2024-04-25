
<x-layout>
    <x-slot:heading>
        Games Page
    </x-slot:heading>
    <main>

        <form action="{{ route('products.index') }}" method="GET" class="max-w-md mb-10">
            @csrf
            <div class="flex space-x-4 justify-end">
                <div>
                    <label for="min_price" class="block text-sm font-medium text-gray-900">Min Price:</label>
                    <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" class="mt-1 block w-full p-2 text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="max_price" class="block text-sm font-medium text-gray-900">Max Price:</label>
                    <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" class="mt-1 block w-full p-2 text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <button type="submit" class="mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-lg text-sm px-4 py-2">Filter</button>
                </div>
            </div>
        </form>

        <form class="max-w-md mb-10 ml-auto">
            @csrf
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative flex justify-end">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input value="{{ request()->get('name') ?? '' }}" type="search" id="default-search" name="name" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for a game..." />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>

        <div class="grid grid-cols-3 gap-3">
            @foreach($products as $product)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('products.show', $product->id) }}">
                            <img class="rounded-t-lg w-full object-cover object-center h-[500px]" src="{{ asset($product->image) }}" alt="Image of {{ $product->name }}">
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
                        </a>
                        <div class="flex justify-between">
                            <div>
                                <a href="{{ route('products.show', $product->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Edit
                                    <svg class="w-[21px] h-[21px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                    </svg>

                                </a>
                            </div>
                            <div>
                                {{--                                form pe buton cu product_id, actionul pe formm o sa fie ruta de tip POST care trimite product_id si acces la auth_id in controller
                                 record pe table da wishlist, uuid, product_id, auth_id auth()->id = auth->user->{id}
                                 metoda 2
                                 un axios POST care face submit tot pe o ruta POST in care se trimite din front product id, auth id product id access. --}}
                                <button class="addButton inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-product-id="{{ $product->id }}">Wishlist
                                    <svg class="w-[21px] h-[21px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">--}}
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>

<script>
    let addToWishListRoute = @json(route('wishlist.add'))
</script>

<script>
    addEventListener("DOMContentLoaded", (event) => {

        $('.addButton').on('click', (e) => {
            let productId = $(e.currentTarget).data('productId')

            axios.post(addToWishListRoute, {
                productId
            }).then(({data}) => {
                console.log(data) //add red heart de adaugat clasa e.currentTarget.find si adaug clasa stilizata din css
            }).catch(({response}) => {
                console.log(response)
            })
        })

    })
    function myFunction() {
        document.getElementById("demo").innerHTML = "Korny was here!";
    }
</script>
