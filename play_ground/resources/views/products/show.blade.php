
<x-layout>
    <x-slot:heading>
        More about: {{$product->name}}

    </x-slot:heading>
    {{-- after you click on a  product from the game page --}}
    <!-- component -->
    <section class="bg-custom-light dark:bg-custom-dark text-gray-700 body-font overflow-hidden bg-white">
        <div class="bg-custom-light dark:bg-custom-dark container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="{{ $product->name }}" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">YOUR SELECTED GAME</h2>
                    <h1 class="text-gray-900 dark:text-gray-300 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
                    <div class="flex mb-4">
                    </div>
                    <div class="flex display-flex justify-between">
                        <p class="dark:text-custom-dark-text leading-relaxed">{{ $product->description }}</p>
                    </div>
                    <p class="dark:dark:text-gray-300 leading-relaxed">Only {{ $product->stock }} left</p>
                    <div class="bg-custom-light dark:bg-custom-dark flex mt-6 items-center pb-5 border-b-2 mb-5">
                    </div>
                    <div class="flex">
                        <span class="dark:dark:text-gray-300 title-font font-medium text-2xl text-gray-900">{{ $product->price }} {{$product->currency}}</span>
                        <button class="addButton inline-flex ml-auto items-center px-6 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-product-id="{{ $product->id }}">Add to cart</button>
                    </div>
                </div>
                <a href="{{ route('products.index') }}" type="button" class="text-red-400 text-sm font-bold mt-5">Back</a>
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-custom-dark py-8 lg:py-16 antialiased">
        <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-gray-300">Discussion ({{ $comments->count() }})</h2>
            </div>
            <form class="mb-6" action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="py-2 px-4 mb-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea name="body" id="comment" rows="4" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
                </div>
                <button type="submit" class="inline-flex ml-auto items-center px-6 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post comment</button>
            </form>
            @foreach ($comments as $comment)
                <article class="p-6 text-base bg-white rounded-lg dark:bg-custom-dark mb-4">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <img class="mr-2 w-6 h-6 rounded-full" src="{{ $comment->user->profile_picture ?? 'https://c4.wallpaperflare.com/wallpaper/702/705/75/rocket-raccoon-baby-groot-artwork-hd-wallpaper-preview.jpg' }}" alt="{{ $comment->user->first_name }} {{ $comment->user->last_name }}">
                            <p class="text-sm text-gray-900 dark:text-gray-300 font-semibold">
                                {{ $comment->user->first_name }} {{ $comment->user->last_name }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-300 ml-2">
                                <time pubdate datetime="{{ $comment->created_at->toIso8601String() }}" title="{{ $comment->created_at->toFormattedDateString() }}">
                                    {{ $comment->created_at->format('M d, Y') }}
                                </time>
                            </p>
                        </div>
                        @can('delete', $comment)
                            <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:focus:ring-gray-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </form>
                        @endcan
                    </footer>
                    <p class="text-gray-500 dark:text-gray-300">{{ $comment->body }}</p>
                    <!-- Add reply button or other interaction options -->
                </article>
            @endforeach
        </div>
    </section>

</x-layout>

<script>
    let addToCartRoute = @json(route('cart.add'))
</script>

<script>
    addEventListener("DOMContentLoaded", (event) => {

        $('.addButton').on('click', (e) => {
            let productId = $(e.currentTarget).data('productId')

            axios.post(addToCartRoute, {
                productId
            }).then(({data}) => {
                console.log(data) //add red heart de adaugat clasa e.currentTarget.find si adaug clasa stilizata din css
            }).catch(({response}) => {
                console.log(response)
            })
        })

    })

    function myFunction() {
        document.getElementById("demo").innerHTML = "Hello World";
    }
</script>
