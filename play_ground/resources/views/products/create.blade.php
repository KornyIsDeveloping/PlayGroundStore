<x-layout>
    <x-slot:heading>
        Add a game
    </x-slot:heading>
    <form method="POST" action="/products">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Add a new Game</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">What's new in gaming today?</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-lable for="name">Name</x-form-lable>
                        <div class="mt-2">
                        <x-form-input name="name" id="name" placeholder="Mortal Kombat 11" required/>

                        <x-form-error name="name"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-lable for="description">Description</x-form-lable>
                        <div class="mt-2">
                            <x-form-input name="description" id="description" placeholder="Some relevant information about your listing game..." required/>

                            <x-form-error name="description"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-lable for="price">Price</x-form-lable>
                        <div class="mt-2">
                            <x-form-input name="price" id="price" placeholder="30.99" required/>

                            <x-form-error name="price"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-lable for="currency">Currency</x-form-lable>
                        <div class="mt-2">
                            <x-form-input name="currency" id="currency" placeholder="EUR/USD/RON" required/>

                            <x-form-error name="currency"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-lable for="stock">Stock</x-form-lable>
                        <div class="mt-2">
                            <x-form-input name="stock" id="stock" placeholder="10" required/>

                            <x-form-error name="stock"/>
                        </div>
                    </x-form-field>
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
                                <input id="image" name="image" type="file" class="sr-only">
                            </label>
                        </h3>
                        <p class="mt-1 text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>

                    <img src="" class="mt-4 mx-auto max-h-40 hidden" id="preview">
                </div>

                <script>
                    var dropzone = document.getElementById('ropzone');

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

        <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>

