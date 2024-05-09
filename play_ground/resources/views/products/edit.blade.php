
<x-layout>
    <x-slot:heading>
        Edit Game: {{ $product->name }}
    </x-slot:heading>
        <div class="h-screen">
            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name" class="block text-sm font-medium leading-6 dark:text-custom-dark-text">Name of the Game</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            value="{{ $product->name }}"
                                            class="block flex-1 border-0 dark:bg-gray-800 py-1.5 px-3 dark:text-custom-dark-text placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="Mortal Kombat 11"
                                            required>
                                    </div>

                                    @error('name')
                                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="description" class="block text-sm font-medium leading-6 dark:text-custom-dark-text">Description</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <textarea
                                    type="text"
                                    name="description"
                                    id="description"
                                    value="{{ $product->description }}"
                                    class="block flex-1 border-0 dark:bg-gray-800 py-1.5 px-3 dark:text-custom-dark-text placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Edit your listing game information..."
                                    required>{{ $product->description }}</textarea>
                                    </div>
                                    @error('description')
                                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="price" class="block text-sm font-medium leading-6 dark:text-custom-dark-text">Price</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input
                                            type="text"
                                            name="price"
                                            id="price"
                                            value="{{ $product->price }}"
                                            class="block flex-1 border-0 dark:bg-gray-800 py-1.5 px-3 dark:text-custom-dark-text placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="30.99"
                                            required>
                                    </div>

                                    @error('title')
                                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="currency" class="block text-sm font-medium leading-6 dark:text-custom-dark-text">Currency</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input
                                            type="text"
                                            name="currency"
                                            id="currency"
                                            value="{{ $product->currency }}"
                                            class="block flex-1 border-0 dark:bg-gray-800 py-1.5 px-3 dark:text-custom-dark-text placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="EUR"
                                            required>
                                    </div>

                                    @error('currency')
                                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="stock" class="block text-sm font-medium leading-6 dark:text-custom-dark-text">Stock</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input
                                            type="text"
                                            name="stock"
                                            id="stock"
                                            value="{{ $product->stock }}"
                                            class="block flex-1 border-0 dark:bg-gray-800 py-1.5 px-3 dark:text-custom-dark-text placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="10"
                                            required>
                                    </div>

                                    @error('title')
                                    <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <x-form-lable for="image" class="dark:text-custom-dark-text">Upload an Image</x-form-lable>
                            <x-form-input type="file" name="image" id="image" required/>
                            <x-form-error name="image"/>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <div class="flex items-center">
                        <button form="delete-form" type="submit" class="dark:text-custom-dark-button text-sm font-bold">Delete</button>
                    </div>
                    <div class="flex items-center gap-x-6">
                        <a href="/products" class="text-sm font-semibold leading-6 text-custom-dark-button">Cancel</a>
                        <div>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                        </div>
                    </div>
                </div>
            </form>

            <form method="POST" action="/products/{{ $product->id }}" class="hidden" id="delete-form">
                @csrf
                @method('DELETE')
            </form>
        </div>
</x-layout>
