<x-layout>
    <x-slot:heading>
        Edit Game: {{ $product->name }}
    </x-slot:heading>
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name of the Game</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ $product->name }}"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Mortal Kombat 11"
                                    required>
                            </div>

                            @error('name')
                            <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <textarea
                                    type="text"
                                    name="description"
                                    id="description"
                                    value="{{ $product->description }}"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Edit your listing game information..."
                                    required>{{ $product->description }}</textarea>
                            </div>
                            @error('description')
                            <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="price"
                                    id="price"
                                    value="{{ $product->price }}"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="30.99"
                                    required>
                            </div>

                            @error('title')
                            <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="currency" class="block text-sm font-medium leading-6 text-gray-900">Currency</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="currency"
                                    id="currency"
                                    value="{{ $product->currency }}"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="EUR/USD/RON"
                                    required>
                            </div>

                            @error('currency')
                            <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="stock" class="block text-sm font-medium leading-6 text-gray-900">Stock</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="stock"
                                    id="stock"
                                    value="{{ $product->stock }}"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="10"
                                    required>
                            </div>

                            @error('title')
                            <p class="text-xs text-red-400 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                    <div class="w-[400px] relative border-2 border-gray-300 border-dashed rounded-lg p-6 mt-5" id="dropzone">
                        <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" />
                        <div class="text-center">
                            <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                            <h3 class="mt-2 text-sm font-medium text-gray-900">
                                <label for="file-upload" class="relative cursor-pointer">
                                    <span>Drag and drop</span>
                                    <span class="text-indigo-600"> or browse</span>
                                    <span>to upload</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                            </h3>
                            <p class="mt-1 text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>

                        <img src="" class="mt-4 mx-auto max-h-40 hidden" id="preview">
                    </div>

                    <script>
                        var dropzone = document.getElementById('dropzone');

                        dropzone.addEventListener('dragover', e => {
                            e.preventDefault();
                            dropzone.classList.add('border-indigo-600');
                        });

                        dropzone.addEventListener('dragleave', e => {
                            e.preventDefault();
                            dropzone.classList.remove('border-indigo-600');
                        });

                        dropzone.addEventListener('drop', e => {
                            e.preventDefault();
                            dropzone.classList.remove('border-indigo-600');
                            var file = e.dataTransfer.files[0];
                            displayPreview(file);
                        });

                        var input = document.getElementById('file-upload');

                        input.addEventListener('change', e => {
                            var file = e.target.files[0];
                            displayPreview(file);
                        });

                        function displayPreview(file) {
                            var reader = new FileReader();
                            reader.readAsDataURL(file);
                            reader.onload = () => {
                                var preview = document.getElementById('preview');
                                preview.src = reader.result;
                                preview.classList.remove('hidden');
                            };
                        }
                    </script>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-form" type="submit" class="text-red-400 text-sm font-bold">Delete</button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="/products" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
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
</x-layout>

